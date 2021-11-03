<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddTourRequest;
use App\Repositories\Contracts\RepositoryInterface\CountriesRepositoryInterface;
use App\Repositories\Contracts\RepositoryInterface\TourRepositoryInterface;
use App\Repositories\Contracts\RepositoryInterface\TransportRepositoryInterface;
use App\Services\TourService;
use Illuminate\Http\Request;

class TourController extends Controller
{
    protected $tourRepo;
    protected $tourService;
    protected $transportRepo;
    protected $countriesRepo;

    public function __construct(
        TourRepositoryInterface $tourRepo,
        TourService $tourService,
        TransportRepositoryInterface $transportRepo,
        CountriesRepositoryInterface $countriesRepo
    ){
        $this->tourRepo = $tourRepo;
        $this->tourService = $tourService;
        $this->transportRepo = $transportRepo;
        $this->countriesRepo = $countriesRepo;
    }

    /**
     * Show tour
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $tours = $this->tourRepo->getAll();
        $transports = $this->transportRepo->getAll();
        $countries = $this->countriesRepo->getAll();
        $tours->load('tourTransport', 'tourCountries');

        return view('admin.tour.index', compact('tours', 'transports', 'countries'));
    }

    /**
     * Xóa tour
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        try {
            $this->tourRepo->delete($id);
        }catch (\Exception $exception) {
            return back()->withErrors($exception->getMessage('Xóa không thành công!!!'))->withInput();
        }

        return redirect()->back();
    }

    /**
     * Lưu tour
     * @param AddTourRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function add(AddTourRequest $request)
    {
        try {
            $data = $request->validated();
            $this->tourService->addTour($data);
        } catch (\Exception $exception) {
            return back()->withError($exception->getMessage('đâ'))->withInput();
        }

        return redirect(route('tour.index'));
    }

    /**
     * form edit tour
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function viewEdit($id)
    {
        $tour = $this->tourRepo->find($id);
        $transports = $this->transportRepo->getAll();
        $countries = $this->countriesRepo->getAll();
        $tour->load('tourTransport', 'tourCountries');

        return view('admin.tour.edit', compact('tour', 'transports', 'countries'));
    }

    /**
     * Lưu tourEdit
     * @param $id
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function postEdit($id, Request $request)
    {
        try {
            $this->tourService->updateTour($id, $request);
        }catch (\Exception $exception){
            return back()->withErrors($exception->getMessage('Cập nhật thất bại!!!'))->withInput();
        }

        return redirect(route('tour.index'));
    }

    /**
     * description tour
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function viewDetail(Request $request)
    {
        $id = $request->query('id');
        $tour = $this->tourRepo->find($id);

        return response()->json($tour);
    }
}

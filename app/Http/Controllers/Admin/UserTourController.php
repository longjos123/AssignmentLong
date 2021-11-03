<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use App\Models\Tour;
use App\Models\User;
use App\Models\UserTour;
use App\Repositories\Contracts\RepositoryInterface\HotelRepositoryInterface;
use App\Repositories\Contracts\RepositoryInterface\TourRepositoryInterface;
use App\Repositories\Contracts\RepositoryInterface\UserRepositoryInterface;
use App\Repositories\Contracts\RepositoryInterface\UserTourRepositoryInterface;
use App\Services\UserTourService;
use Illuminate\Http\Request;

class UserTourController extends Controller
{
    /**
     * @var
     */
    protected $userRepo;
    /**
     * @var
     */
    protected $userTourRepo;
    /**
     * @var
     */
    protected $hotelRepo;
    /**
     * @var
     */
    protected $tourRepo;
    /**
     * @var
     */
    protected $userTourService;

    /**
     * @param UserRepositoryInterface $userRepository
     * @param UserTourRepositoryInterface $userTourRepository
     * @param HotelRepositoryInterface $hotelRepository
     * @param TourRepositoryInterface $tourRepository
     */
    public function __construct
    (
        UserRepositoryInterface $userRepository,
        UserTourRepositoryInterface $userTourRepository,
        HotelRepositoryInterface $hotelRepository,
        TourRepositoryInterface $tourRepository,
        UserTourService $userTourService
    )
    {
        $this->userRepo = $userRepository;
        $this->userTourRepo = $userTourRepository;
        $this->hotelRepo = $hotelRepository;
        $this->tourRepo = $tourRepository;
        $this->userTourService = $userTourService;
    }

    /**
     * show tour booked
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(){
        $userTours = $this->userTourRepo->getTourConfirm();
        $hotels = $this->hotelRepo->getAll();
        $tours = $this->tourRepo->getAll();
        $users = $this->userRepo->getUserCustomer();
        $userTours->load('user','tour', 'hotel');

        return view('admin.user_tour.index', compact('userTours','users','tours','hotels'));
    }

    /**
     * Xóa tour đã đặt
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        try {
            $this->userTourRepo->delete($id);
        }catch (\Exception $exception){
            return back()->withErrors($exception->getMessage('Xóa thành công!!!'))->withInput();
        }

        return redirect()->back();
    }

    /**
     * trả ra view edit booked tour
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function formEdit($id)
    {
        $userTour = $this->userTourRepo->find($id);
        $hotels = $this->hotelRepo->getAll();
        $userTour->load('hotel','user','tour');

        return view('admin.user_tour.edit', compact('userTour','hotels'));
    }

    /**
     * Lưu dữ liệu edit booked tour
     * @param $id
     * @param Request $request
     */
    public function postEdit($id, Request $request)
    {
        $this->userTourService->update($id, $request);

        return redirect(route('tour_user.index'));
    }

    /**
     * Book tour
     * @param Request $request array
     * @return \Illuminate\Http\RedirectResponse
     */
    public function bookTour(Request $request)
    {
        try {
            $this->userTourService->add($request);
        }catch (\Exception $exception){
            return back()->withErrors($exception->getMessage())->withInput();
        }

        return redirect()->back();
    }
}

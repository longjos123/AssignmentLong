<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\Contracts\RepositoryInterface\CountriesRepositoryInterface;
use App\Repositories\Contracts\RepositoryInterface\TourRepositoryInterface;
use App\Repositories\Contracts\RepositoryInterface\TransportRepositoryInterface;
use App\Services\TourService;
use Illuminate\Http\Request;

class TourController extends Controller
{
    /**
     * @var TourRepositoryInterface
     */
    protected $tourRepo;
    /**
     * @var TourService
     */
    protected $tourService;
    /**
     * @var TransportRepositoryInterface
     */
    protected $transportRepo;
    /**
     * @var CountriesRepositoryInterface
     */
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $tours = $this->tourRepo->getAll();
        $transports = $this->transportRepo->getAll();
        $countries = $this->countriesRepo->getAll();
        $tours->load('tourTransport', 'tourCountries');

        return response()->json([
            'tour' => $tours,
            'transports' => $transports,
            'countries' => $countries,
            'status' => 200
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $this->tourService->addTour($request);
        }catch (\Exception $exception){
            return back()->withError($exception->getMessage())->withInput();
        }

        return response()->json(['status' => 201]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tour = $this->tourRepo->find($id);
        $tour->load('tourTransport', 'tourCountries');

        return response()->json([
            'tour' => $tour,
            'status' => 200
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

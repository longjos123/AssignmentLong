<?php

namespace App\Services;

use App\Models\Tour;
use App\Models\UserTour;
use App\Repositories\Contracts\RepositoryInterface\TourRepositoryInterface;
use App\Repositories\Contracts\RepositoryInterface\UserTourRepositoryInterface;

class UserTourService
{
    /**
     * @var UserTourRepositoryInterface
     */
    protected $userTourRepo;
    protected $tourRepo;
    /**
     * @param UserTourRepositoryInterface $userTourRepository
     */
    public function __construct(UserTourRepositoryInterface $userTourRepository, TourRepositoryInterface $tourRepository)
    {
        $this->userTourRepo = $userTourRepository;
        $this->tourRepo = $tourRepository;
    }

    /**
     * @param $id
     * @param $request array
     */
    public function update($id, $request)
    {
        $userTour = [
            'phone_number' => $request->phone_number,
            'num_people' => $request->num_people,
            'hotel_id' => $request->hotel_id,
            'start_date' => $request->start_date,
            'status' => $request->status
        ];

        return $this->userTourRepo->update($id, $userTour);
    }

    /**
     * add booking tour
     * @param $request array
     */
    public function add($request)
    {
        //Get tour booking
        $tour = $this->tourRepo->find($request->tour_id);

        $booking = [
            'user_id' => $request->user_id,
            'tour_id' => $request->tour_id,
            'num_people' => $request->num_people,
            'hotel_id' => $request->hotel_id,
            'phone_number' => $request->phone_number,
            'start_date' => $request->start_date,
            'name' => '-',
            'confirm_tour' => 1,
            'status' => 1,
            'fixed_price' => ($request->num_people) * ($tour->price),
            'end_date' => date("Y-m-d", strtotime(date("Y-m-d", strtotime($request->start_date)) . " +$tour->num_day days"))
        ];

        return $this->userTourRepo->create($booking);
    }
}

<?php

namespace App\Services;

use App\Models\Tour;
use App\Models\UserTour;
use App\Repositories\Contracts\RepositoryInterface\UserTourRepositoryInterface;

class UserTourService
{
    /**
     * @var UserTourRepositoryInterface
     */
    protected $userTourRepo;

    /**
     * @param UserTourRepositoryInterface $userTourRepository
     */
    public function __construct(UserTourRepositoryInterface $userTourRepository)
    {
        $this->userTourRepo = $userTourRepository;
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

        $this->userTourRepo->update($id, $userTour);
    }

    /**
     * add booking tour
     * @param $request array
     */
    public function add($request)
    {
        //Get tour booking
        $tour = Tour::find($request->tour_id);

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

        $this->userTourRepo->create($booking);
    }
}

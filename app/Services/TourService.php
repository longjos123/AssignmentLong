<?php

namespace App\Services;

use App\Repositories\Contracts\RepositoryInterface\TourRepositoryInterface;

class TourService
{
    /**
     * @var TourRepositoryInterface
     */
    protected $tourRepo;

    /**
     * @param TourRepositoryInterface $tourRepository
     */
    public function __construct(TourRepositoryInterface $tourRepository)
    {
        $this->tourRepo = $tourRepository;
    }

    /**
     * add tour
     * @param $request
     */
    public function addTour($request)
    {
        $tour = [
            'name' => $request->name,
            'num_day' => $request->num_day,
            'transport_id' => $request->transport_id,
            'description' => $request->description,
            'price' => $request->price,
            'countries_id' => $request->countries_id,
        ];
        $tour['image'] = $this->imageProcessing($request);

        $this->tourRepo->create($tour);
    }

    public function updateTour($id, $request)
    {
        $tourEdit = [
            'name' => $request->name,
            'num_day' => $request->num_day,
            'transport_id' => $request->transport_id,
            'description' => $request->description,
            'price' => $request->price,
            'countries_id' => $request->countries_id,
        ];
        if($request->hasFile('image')){
            $tourEdit['image'] = $this->imageProcessing($request);
        }
        $this->tourRepo->update($id, $tourEdit);
    }

    /**
     * Xử lí ảnh
     * @param $request
     * @param $arr
     */
    public function imageProcessing($request)
    {
        $image = $request->file('image')->storeAs('uploads/imgTour', uniqid() . '-' . $request->image->getClientOriginalName());

        return $image;
    }


}

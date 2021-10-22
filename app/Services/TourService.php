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
        $tour = resolve('Tour');
        $tour->fill($request->all());
        $this->imageProcessing($request, $tour);

        $tourAdd = $tour->toArray();
//        $tour = [
//            'name' => $request->name,
//            'num_day' => $request->num_day,
//            'transport_id' => $request->transport_id,
//            'description' => $request->description,
//            'price' => $request->price,
//            'countries_id' => $request->countries_id,
//        ];


        $this->tourRepo->create($tourAdd);
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
        $this->imageProcessing($request, $tourEdit);
        $this->tourRepo->update($id, $tourEdit);
    }

    /**
     * Xử lí ảnh
     * @param $request
     * @param $arr
     */
    public function imageProcessing($request, $arr)
    {
        if($request->hasFile('image')){
            $arr['image'] = $request->file('image')->storeAs('uploads/imgTour', uniqid() . '-' . $request->image->getClientOriginalName());
        }
    }


}

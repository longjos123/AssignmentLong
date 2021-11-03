<?php

namespace App\Services;

use App\Http\Requests\AddTourRequest;
use App\Repositories\Contracts\RepositoryInterface\TourRepositoryInterface;
use Symfony\Component\HttpFoundation\Request;


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
     * add tour
     * @param AddTourRequest $request
     */
    public function addTour($data)
    {
        if(!empty($data['image'])) {
            $data['image'] = $this->imageProcessing($data['image']);
        }

        return $this->tourRepo->create($data);
    }


    /**
     * Xử lí đường dẫn ảnh
     * @param $request
     * @param $arr
     */
    public function imageProcessing($image)
    {
        $storedPath = $image->move('uploads/imgTour', $image->getClientOriginalName());
        return $storedPath;
    }
}

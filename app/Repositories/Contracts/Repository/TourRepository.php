<?php

namespace App\Repositories\Contracts\Repository;

use App\Models\Tour;
use App\Repositories\Contracts\RepositoryInterface\TourRepositoryInterface;
use App\Repositories\Frames\BaseRepository;

class TourRepository extends BaseRepository implements TourRepositoryInterface
{
    public function getModel()
    {
        return Tour::class;
    }

    public function getTour()
    {
        return $this->model->take(6)->get();
    }
}

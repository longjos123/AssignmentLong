<?php

namespace App\Repositories\Contracts\Repository;

use App\Models\Hotel;
use App\Repositories\Contracts\RepositoryInterface\HotelRepositoryInterface;
use App\Repositories\Frames\BaseRepository;

class HotelRepository extends BaseRepository implements HotelRepositoryInterface
{
    public function getModel()
    {
        return Hotel::class;
    }
}

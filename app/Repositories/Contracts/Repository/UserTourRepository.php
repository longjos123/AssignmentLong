<?php

namespace App\Repositories\Contracts\Repository;

use App\Models\UserTour;
use App\Repositories\Contracts\RepositoryInterface\UserTourRepositoryInterface;
use App\Repositories\Frames\BaseRepository;

class UserTourRepository extends BaseRepository implements UserTourRepositoryInterface
{
    public function getModel()
    {
        return UserTour::class;
    }
}

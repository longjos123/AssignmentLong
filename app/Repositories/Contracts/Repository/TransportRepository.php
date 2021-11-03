<?php

namespace App\Repositories\Contracts\Repository;

use App\Models\Transport;
use App\Repositories\Contracts\RepositoryInterface\TransportRepositoryInterface;
use App\Repositories\Frames\BaseRepository;

class TransportRepository extends BaseRepository implements TransportRepositoryInterface
{
    public function getModel()
    {
        return Transport::class;
    }
}

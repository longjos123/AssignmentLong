<?php

namespace App\Repositories\Contracts\Repository;

use App\Models\News;
use App\Repositories\Contracts\RepositoryInterface\NewsRepositoryInterface;
use App\Repositories\Frames\BaseRepository;

class NewsRepository extends BaseRepository implements NewsRepositoryInterface
{
    public function getModel()
    {
        return News::class;
    }
}

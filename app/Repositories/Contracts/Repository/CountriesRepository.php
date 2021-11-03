<?php

namespace App\Repositories\Contracts\Repository;

use App\Models\Countries;
use App\Repositories\Contracts\RepositoryInterface\CountriesRepositoryInterface;
use App\Repositories\Frames\BaseRepository;

class CountriesRepository extends BaseRepository implements CountriesRepositoryInterface
{
    public function getModel()
    {
        return Countries::class;
    }
}

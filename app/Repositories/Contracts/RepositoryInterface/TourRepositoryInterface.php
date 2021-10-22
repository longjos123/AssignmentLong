<?php

namespace App\Repositories\Contracts\RepositoryInterface;

use App\Repositories\Frames\RepositoryInterface;

interface TourRepositoryInterface extends RepositoryInterface
{
    //Lấy 6 tour đầu tiên
    public function getTour();

}

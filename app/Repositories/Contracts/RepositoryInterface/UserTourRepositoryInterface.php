<?php

namespace App\Repositories\Contracts\RepositoryInterface;

use App\Repositories\Frames\RepositoryInterface;

interface UserTourRepositoryInterface extends RepositoryInterface
{
    /**
     * Lấy tour đã confirm
     * @return mixed
     */
    public function getTourConfirm();
}

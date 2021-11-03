<?php

namespace App\Repositories\Contracts\RepositoryInterface;

use App\Repositories\Frames\RepositoryInterface;

interface UserRepositoryInterface extends RepositoryInterface
{
    /**
     * Lấy user Customer
     * @return mixed
     */
    public function getUserCustomer();
}

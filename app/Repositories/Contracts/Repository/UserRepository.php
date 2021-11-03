<?php

namespace App\Repositories\Contracts\Repository;

use App\Models\User;
use App\Repositories\Contracts\RepositoryInterface\UserRepositoryInterface;
use App\Repositories\Frames\BaseRepository;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    public function getModel()
    {
        return User::class;
    }
    public function getUserCustomer()
    {
        return User::where('role','=',0)->get();
    }
}

<?php

namespace App\Services;

use App\Repositories\Contracts\RepositoryInterface\UserRepositoryInterface;
use Illuminate\Support\Facades\Hash;

class UserService
{
    protected $userRepo;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepo = $userRepository;
    }

    /**
     * Add User
     * @param $request
     */
    public function add($request)
    {
        $user = [];
        $user->fill($request->all());
        $this->imageProcessing($request, $user);
        $user['password'] = Hash::make($request->password);
        dd($user);
        $this->userRepo->create($user);
    }

    public function imageProcessing($request, $arr)
    {
        if($request->hasFile('image')){
            $arr->avatar_url    = $request->file('image')->storeAs('uploads/imgUser', uniqid() . '-' . $request->image->getClientOriginalName());
        }
    }
}

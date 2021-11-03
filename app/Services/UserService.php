<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\Contracts\RepositoryInterface\UserRepositoryInterface;
use Illuminate\Support\Facades\Hash;

class UserService
{
    /**
     * @var UserRepositoryInterface
     */
    protected $userRepo;


    /**
     * @param UserRepositoryInterface $userRepository
     */
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepo = $userRepository;
    }

    /**
     * Add User
     * @param $request array
     */
    public function add($request)
    {
        $user = [
            'fullname' => $request->fullname,
            'email' => $request->email,
            'password' => $request->password,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
            'birth_date' => $request->birth_date,
            'gender' => $request->gender,
            'role' => $request->role
        ];

        if($request->hasFile('image')) {
            $user['avatar_url'] = $this->imageProcessing($request);
        }
        $this->userRepo->create($user);
    }

    /**
     * Post edit user[
     * @param $id
     * @param $request
     */
    public function update($id, $request)
    {
        $userEdit = [
            'fullname' => $request->fullname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone_number' => $request->phone_number,
            'address' => $request->address,
            'birth_date' => $request->birth_date,
            'gender' => $request->gender,
            'role' => $request->role
        ];
        if($request->hasFile('image')) {
            $userEdit['avatar_url'] = $this->imageProcessing($request);
        }

        $this->userRepo->update($id, $userEdit);
    }

    /**
     * Xử lí ảnh
     * @param $request
     * @return mixed
     */
    public function imageProcessing($request)
    {
        $avatar_url = $request->file('image')->storeAs('uploads/imgUser', uniqid() . '-' . $request->image->getClientOriginalName());

        return $avatar_url;
    }


}

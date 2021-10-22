<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Repositories\Contracts\RepositoryInterface\UserRepositoryInterface;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    protected $userRepo;
    protected $userService;

    public function __construct(
        UserRepositoryInterface $userRepo,
        UserService $userService
    )
    {
        $this->userRepo = $userRepo;
        $this->userService = $userService;
    }

    /**
     * show user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(){
        $users = $this->userRepo->getAll();

        return view('admin.users.index',compact('users'));
    }

    /**
     * add User
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function add(Request $request)
    {
        $this->userService->add($request);

        return redirect(route('user.index'));
    }
    public function delete($id)
    {
        User::destroy($id);

        return redirect()->back();
    }
    public function viewEdit($id)
    {
        $user = User::find($id);

        return view('admin.users.edit',compact('user'));
    }
    public function postEdit($id, Request $request)
    {
        $user = User::find($id);
        $user->fill($request->all());
        $user->password = Hash::make($request->password);

        if($request->hasFile('image')){
            $user->avatar_url    = $request->file('image')->storeAs('uploads/imgUser', uniqid() . '-' . $request->image->getClientOriginalName());
        }
        $user->save();

        return redirect(route('user.index'));
    }
}

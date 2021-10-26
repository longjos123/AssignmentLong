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
    /**
     * @var UserRepositoryInterface
     */
    protected $userRepo;
    /**
     * @var UserService
     */
    protected $userService;

    /**
     * @param UserRepositoryInterface $userRepo
     * @param UserService $userService
     */
    public function __construct
    (
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
        try {
            $this->userService->add($request);
        }catch (\Exception $exception){
            return back()->withErrors($exception->getMessage())->withInput();
        }

        return redirect(route('user.index'));
    }

    /**
     * Delete User
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        try {
            $this->userRepo->delete($id);
        }catch (\Exception $exception){
            return back()->withErrors($exception->getMessage())->withInput();
        }

        return redirect()->back();
    }

    /**
     * View to edit User
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function viewEdit($id)
    {
        $user = $this->userRepo->find($id);

        return view('admin.users.edit',compact('user'));
    }

    /**
     * post data user edit
     * @param $id
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function postEdit($id, Request $request)
    {
        try {
            $this->userService->update($id, $request);
        }catch (\Exception $exception){
            return back()->withErrors($exception->getMessage())->withInput();
        }

        return redirect(route('user.index'));
    }
}

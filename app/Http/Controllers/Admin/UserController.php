<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        $users = User::all();

        return view('admin.users.index',compact('users'));
    }

    public function add(Request $request)
    {
        $user = new User();
        $user->fill($request->all());

        $user->password = Hash::make($request->password);
        if($request->hasFile('image')){
            $user->avatar_url    = $request->file('image')->storeAs('uploads/imgUser', uniqid() . '-' . $request->image->getClientOriginalName());
        }
        $user->save();

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

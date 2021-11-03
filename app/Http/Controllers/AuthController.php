<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])
            || Auth::attempt(['phone_number' => $request->email, 'password' => $request->password]))
        {

            return redirect(route('home'));
        }
        return redirect()->back()->with('msg', 'Sai thong tin dang nhap');
    }
    public function logout()
    {
        Auth::logout();

        return redirect(route('home'));
    }
    public function register(Request $request)
    {
        $user = new User();

        $user->fill($request->all());
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect(route('home'));
    }
}

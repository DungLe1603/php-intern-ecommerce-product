<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function showLogin()
    {
        return view('admin.index');
    }

    public function handleLogin(Request $request)
    {
        $user = User::where('name', $request->username)->first();
        //Check admin exits
        if (empty($user)) {
            return redirect()->back()->with('error', 'User Name invalid');
        }
        //Check password
        if (!Hash::check($request->password, $user->password)) {
            return redirect()->back()->with('error', 'Password Invalid');
        }

        return redirect()->route('admin.dashboard')->with('success', 'Login Successfull');
    }

    public function logout()
    {
        return redirect()->route('admin.showLogin')->with('logout', 'Logout Success !');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{

    public function showLogin()
    {
        return view('admin.index');
    }

    public function login(Request $request)
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
        session(['user' => $user]);

        return redirect()->route('admin.products.index')->with('success', 'Login Successfull');
    }

    public function logout(Request $request)
    {
        $request->session()->forget('user');

        return redirect()->route('admin.showLogin')->with('logout', 'Logout Success !');
    }
}

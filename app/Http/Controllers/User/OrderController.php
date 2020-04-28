<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Cart;

class OrderController extends Controller
{
    public function show()
    {

    }

    public function create()
    {
        return view('user.order.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'fullname' => 'required',
            'email' => 'required',
            'address' => 'required',
            'phone' => 'required',
        ]);

        return view('user.order.show');
    }
}
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
        return view('user.cart.checkout');
    }

    public function store()
    {
        return view('user.order.show');
    }
}

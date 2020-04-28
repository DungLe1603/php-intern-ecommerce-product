<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\StoreOrder;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Cart;
use App\Model\Product;
use App\Model\Order;

class OrderController extends Controller
{
    public function show()
    {

    }

    public function create()
    {
        return view('user.order.create');
    }

    public function store(StoreOrder $request)
    {
        //$newOrder = new Order();
        //$newOrder->total_price = \Cart::getTotal();
        //$newOrder->customer_name = $request->fullname;
        //$newOrder->address = $request->address;
        //$newOrder->phone = $request->phone;
        //$newOrder->email = $request->email;
        //$newOrder->order_notes = $request->order_notes;
        //$newOrder->save();

        return view('user.order.show');
    }
}

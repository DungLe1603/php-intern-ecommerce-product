<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Order;
use App\Model\OrderProduct;
use App\Model\Product;

class OrderController extends Controller
{

    public function index()
    {
        $orders = Order::paginate(8);

        return view('admin.order.listOrder', compact('orders'));
    }

    public function orderProduct($id)
    {
        $orderProduct = OrderProduct::with('order')->where('order_id', $id)->get();
        $products = Product::all();

        return view('admin.order.orderProducts', compact('orderProduct', 'products'));
    }
}

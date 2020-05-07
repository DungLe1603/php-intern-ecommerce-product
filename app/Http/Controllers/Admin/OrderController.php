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
        $order = Order::with('orderproducts')->where('id', $id)->get();
        $products = Product::all();

        $orderProduct = array();
        foreach ($order as $value) {
            $orderProduct = [$value->orderproducts];
        }

        return view('admin.order.orderProducts', compact('orderProduct', 'products', 'order'));
    }
}

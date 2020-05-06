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
        $orderProduct = OrderProduct::with('order')->findOrFail($id)->get();
        $products = Product::all();
        $data = [
            'orderProduct' => $orderProduct,
            'products' => $products
        ];

        return view('admin.order.orderProducts', $data);
    }
}

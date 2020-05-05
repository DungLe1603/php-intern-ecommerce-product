<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Product;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::search($request->slug)->paginate(6)->withPath('products');

        return view('user.product.index', compact('products'));
    }

    public function show(Product $product)
    {
        return view('user.product.show', compact('product'));
    }
}

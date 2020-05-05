<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Product;
use App\Cart;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $slug = $request->query('slug');
        if (isset($slug)) {
            $products = Product::where('product_name', 'LIKE', '%' . $slug . '%')->paginate(6)->withPath('products');
        } else {
            $products = Product::where('quantity', '>', 0)->paginate(6)->withPath('products');
        }


        return view('user.product.index', compact('products'));
    }

    public function show(Product $product)
    {
        return view('user.product.show', compact('product'));
    }

    public function search($slug)
    {
    }
}

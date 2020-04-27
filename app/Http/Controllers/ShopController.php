<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Product;

class ShopController extends Controller
{
    public function index()
    {

        $products = Product::paginate(6)->withPath('products');

        return view('user.products', compact('products'));
    }

    public function show(Product $product)
    {
        return view('user.show', compact('product'));
    }

    public function cart()
    {
    }

    public function addToCart(Product $product)
    {
        \Cart::add(array(
            'id' => $product->id,
            'name' => $product->product_name,
            'price' => $product->price,
            'quantity' => 1,
            'attributes' => array(),
            'associatedModel' => $product
        ));

        return redirect()->back();
    }

    public function removeFromCart(Product $product)
    {
        \Cart::remove($product->id);
        
        return redirect()->back();
    }
}

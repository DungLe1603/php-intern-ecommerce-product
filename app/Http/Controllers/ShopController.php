<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Product;

class ShopController extends Controller
{
    public function index()
    {

        $products = Product::paginate(6)->withPath('products');

        return view('user.product.index', compact('products'));
    }

    public function show(Product $product)
    {
        return view('user.product.show', compact('product'));
    }

    public function showCart()
    {
        return view('user.cart.show');
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

    public function updateCart(Request $request){
        $id = $request->input('id');
        $quantity = $request->input('quantity');

        \Cart::update($id, array(
            'quantity' => array(
                'relative' => false,
                'value' => $quantity
            ),
          ));

        return $quantity;
    }

    public function removeFromCart(Product $product)
    {
        \Cart::remove($product->id);
        
        return redirect()->back();
    }
}

<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Product;
use App\Cart;

class CartController extends Controller
{
    public function show()
    {
        return view('user.cart.show');
    }

    public function add(Product $product)
    {
        if ($product->quantity > 0)
        {
            \Cart::add(array(
                'id' => $product->id,
                'name' => $product->product_name,
                'price' => $product->price,
                'quantity' => 1,
                'attributes' => array(),
                'associatedModel' => $product
            ));
        }
        
        return redirect()->back();
    }

    public function update(Request $request)
    {
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

    public function remove(Product $product)
    {
        \Cart::remove($product->id);
        
        return redirect()->back();
    }
}

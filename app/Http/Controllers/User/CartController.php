<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Product;
use Cart;
use App\Http\Requests\CartRequest;

class CartController extends Controller
{
    public function show()
    {
        if (Cart::isEmpty()) {
            return redirect()->route('products.index');
        }

        return view('user.cart.show');
    }

    public function add(Product $product)
    {
        if ($product->quantity > 0) {
            Cart::add(array(
                'id' => $product->id,
                'name' => $product->product_name,
                'price' => $product->price,
                'quantity' => 1,
                'attributes' => array(
                    'images' => $product->images
                ),
                'associatedModel' => $product
            ));
        }
        
        return redirect()->back();
    }

    public function update(CartRequest $request)
    {
        Cart::update($request->id, array(
            'quantity' => array(
                'relative' => false,
                'value' => $request->quantity
            )
          ));

        return $request->quantity;
    }

    public function remove(Product $product)
    {
        Cart::remove($product->id);
        
        return redirect()->back();
    }
}

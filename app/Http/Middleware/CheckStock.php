<?php

namespace App\Http\Middleware;

use Closure;
use App\Model\Product;

class CheckStock
{
    public function handle($request, Closure $next)
    {
        foreach (\Cart::getContent() as $item) {
            $product = Product::find($item->id);
            if ($product->quantity < $item->quantity) {
                return redirect()->back()->with('error','Not enough products!');;
            }
        }

        $request->request->add(['items' => \Cart::getContent()]);
        $request->request->add(['total' => \Cart::getTotal()]);

        return $next($request);
    }
}

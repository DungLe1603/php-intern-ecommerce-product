<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    protected $fillable = ['order_id', 'product_id', 'quantity', 'price'];

    public static function createMultiple($order_id, $items)
    {
        foreach ($items as $item) {
            $product = Product::find($item->id);
            $product->quantity = $product->quantity - $item->quantity;
            $product->save();

            OrderProduct::create([
                'order_id' =>   $order_id,
                'product_id' => $product->id,
                'quantity' =>   $item->quantity,
                'price' =>      $item->price
            ]);
        }
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}

<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['total_price', 'customer_name', 'address', 'phone', 'email', 'order_notes'];

    public function items()
    {
        return Order::join('order_products', 'orders.id', '=', 'order_products.order_id')
            ->select('orders.id', 'order_products.product_id', 'order_products.quantity', 'order_products.price')
            ->where('orders.id', '=', $this->id)
            ->join('products', 'order_products.product_id', '=', 'products.id')
            ->select('products.product_name', 'order_products.quantity', 'order_products.price')
            ->get();
    }

    public function orderProducts()
    {
        return $this->hasMany(OrderProduct::class);
    }
}

<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['total_price', 'customer_name', 'address', 'phone', 'email', 'order_notes'];

    public function orderProducts()
    {
        return $this->hasMany(OrderProduct::class);
    }
}

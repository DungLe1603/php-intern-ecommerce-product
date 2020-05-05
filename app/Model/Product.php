<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['product_name', 'quantity', 'description', 'configuration', 'images', 'price', 'created_at', 'updated_at'];

    public static function search($slug)
    {
        return Product::where('quantity', '>', 0)->where('product_name', 'LIKE', '%' . $slug . '%');
    }

    public function orderProducts()
    {
        return $this->hasMany(OrderProduct::class);
    }
}

<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['product_name', 'quantity', 'description', 'configuration', 'images', 'price', 'created_at', 'updated_at'];

    public static function latest()
    {
        return Product::where('quantity', '>', 0)->orderBy('created_at', 'desc')->take(6)->get();
    }

    public static function search($slug)
    {
        return Product::where('product_name', 'LIKE', '%' . $slug . '%');
    }

    public function orderProducts()
    {
        return $this->hasMany(OrderProduct::class);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function listAllProducts()
    {
        $products = Product::paginate(8);

        return view('admin.product.list_products', compact('products'));
    }
}

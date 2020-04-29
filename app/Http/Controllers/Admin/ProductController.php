<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Product;
use App\Exports\ProductsExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function listAllProducts()
    {
        $products = Product::paginate(8);

        return view('admin.product.list_products', compact('products'));
    }

    public function editProduct(Product $product)
    {
        return view('admin.product.editProduct', compact('product'));
    }

    public function updateProduct(Request $request, $id)
    {
        $params = $request->all();
        $dataUp = [
            'product_name' => $params['product_name'],
            'quantity' => $params['quantity'],
            'description' => $params['description'],
            'configuration' => $params['configuration'],
            'colors' => $params['colors'],
            'price' => $params['price'],
            'created_at' => $params['created_at'],
            'updated_at' => $params['updated_at']
        ];
        Product::where('id', $id)->update($dataUp);

        return redirect()->route('admin.listAllProducts')->with('success', 'Update Success');
    }

    public function exportProduct()
    {
        return Excel::download(new ProductsExport(), 'ListProducts.xlsx');
    }
}

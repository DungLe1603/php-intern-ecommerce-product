<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ImportProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Imports\ProductsImport;
use App\Model\Product;
use App\Exports\ProductsExport;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{
    public function listAllProducts()
    {
        $products = Product::paginate(8);

        return view('admin.product.list_products', compact('products'));
    }

    public function store(UpdateProductRequest $request)
    {
        $newProduct = new Product([
            'product_name' => $request->product_name,
            'quantity' => $request->quantity,
            'description' => $request->description,
            'configuration' => $request->configuration,
            'colors' => $request->colors,
            'price' => $request->price,
//            The image value is the default when the cdn refer is set again
            'images' => 'img.jpg',
            'created_at' => Carbon::now('Asia/Ho_Chi_Minh'),
        ]);
        $newProduct->save();

        return redirect()->route('admin.listAllProducts')->with('success', 'Add Product Success');
    }

    public function editProduct(Product $product)
    {
        return view('admin.product.editProduct', compact('product'));
    }

    public function updateProduct(UpdateProductRequest $request, $id)
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
            'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')
        ];
        Product::findOrFail($id)->update($dataUp);

        return redirect()->route('admin.listAllProducts')->with('success', 'Update Success');
    }

    public function exportProduct()
    {
        return Excel::download(new ProductsExport(), 'ListProducts.xlsx');
    }

    public function importProduct(ImportProductRequest $request)
    {
        Excel::import(new ProductsImport(), $request->file('file'));

        return redirect()->back()->with('success', 'Import Success');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\ImportProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Imports\ProductsImport;
use App\Model\Product;
use App\Exports\ProductsExport;
use Image;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('checkLoginAdmin');
    }

    public function index()
    {
        $products = Product::paginate(8);

        return view('admin.product.list_products', compact('products'));
    }

    public function create()
    {
        return view('admin.product.createProduct');
    }

    public function store(CreateProductRequest $request)
    {
        $image = $request->file('image')->store('');
        $img = Image::make($request->file('image'));
        $img->resize(600, 600)->save();
        Storage::disk('gcs')->putFile('', $request->file('image'));

        $newProduct = new Product([
            'product_name' => $request->product_name,
            'quantity' => $request->quantity,
            'description' => $request->description,
            'configuration' => $request->configuration,
            'price' => $request->price,
            'images' => $image
        ]);
        $newProduct->save();

        return redirect()->route('admin.index')->with('success', 'Add Product Success');
    }

    public function editProduct(Product $product)
    {
        return view('admin.product.editProduct', compact('product'));
    }

    public function update(UpdateProductRequest $request, $id)
    {
        $params = $request->all();
        if ($request->file('image') == null) {
            $image = $params['old_image'];
        } else {
            $image = $request->file('image')->store('');
            $img = Image::make($request->file('image'));
            $img->resize(600, 600)->save();
            Storage::disk('gcs')->putFile('', $request->file('image'));
        }

        $dataUp = [
            'product_name' => $params['product_name'],
            'quantity' => $params['quantity'],
            'description' => $params['description'],
            'configuration' => $params['configuration'],
            'price' => $params['price'],
            'images' => $image,
        ];
        Product::findOrFail($id)->update($dataUp);

        return redirect()->route('admin.index')->with('success', 'Update Success');
    }

    public function exportProduct()
    {
        return Excel::download(new ProductsExport(), 'ListProducts.xlsx');
    }

    public function importProduct(ImportProductRequest $request)
    {
        try {
            Excel::import(new ProductsImport(), $request->file('file'));
            return redirect()->back()->with('success', 'Import Success');
        } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
            $fail = $e->failures();
            return redirect()->back()->with('error', 'Format Excel Error');
        }
    }

    public function destroy($id)
    {
        ;
        Product::destroy($id);

        return redirect()->back()->with('success', 'Delete Product Success');
    }
}

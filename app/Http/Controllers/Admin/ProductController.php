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
use Maatwebsite\Excel\Validators\ValidationException;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $products = Product::paginate(8);

        return view('admin.product.list_products', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.createProduct');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProductRequest $request)
    {
        $image = $request->file('image')->store('');
        $img = Image::make($request->file('image'));
        $img->resize(600, 600)->save();
        Storage::disk('gcs')->putFile('', $request->file('image'));

        $data = $request->all();
        $data['images'] = $image;
        Product::create($data);

        return redirect()->route('admin.products.index')->with('success', 'Add Product Success');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('admin.product.editProduct', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
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

        return redirect()->route('admin.products.index')->with('success', 'Update Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::destroy($id);

        return redirect()->back()->with('success', 'Delete Product Success');
    }

    public function exportProduct()
    {
        return Excel::download(new ProductsExport(), 'ListProducts.xlsx');
    }

    public function importProduct(ImportProductRequest $request)
    {
        try {
            $excel = Excel::toArray(new ProductsImport(), $request->file('file'))[0];
            foreach ($excel as $value) {
                $products = Product::where('product_name', $value['product_name'])->get();
                if (!$products->isEmpty() && $value['quantity'] > 0 && $value['price'] > 0) {
                    $data = [
                        'quantity' => $products->first()->quantity + $value['quantity'],
                        'price' => $value['price']
                    ];
                    Product::find($products->first()->id)->update($data);
                } else {
                    Excel::import(new ProductsImport(), $request->file('file'));
                }
            }
            return redirect()->back()->with('success', 'Import Success');
        } catch (ValidationException $e) {
            return redirect()->back()->with('error', 'Format Excel Error');
        }
    }
}

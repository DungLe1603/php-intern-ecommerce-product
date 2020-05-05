<?php

namespace App\Imports;

use App\Model\Product;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class ProductsImport implements ToModel, WithHeadingRow, WithValidation
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Product([
            'product_name' => $row['product_name'],
            'quantity' => $row['quantity'],
            'description' => $row['description'],
            'configuration' => $row['configuration'],
            'images' => 'aaaa',
            'price' => $row['price']
        ]);
    }

    public function headingRow(): int
    {
        return 1;
    }

    public function rules(): array
    {
        return [
            'product_name' => "required",
            'quantity' => 'required|numeric|min:1|max:100',
            'description' => 'required',
            'configuration' => 'required',
            'price' => 'required|numeric|min:1|max:1000'
        ];
    }
}

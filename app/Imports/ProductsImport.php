<?php

namespace App\Imports;

use App\Model\Product;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductsImport implements ToModel, WithHeadingRow
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
            'images' => $row['images'],
            'colors' => $row['colors'],
            'price' => $row['price'],
            'created_at' => $row['created_at'],
            'updated_at' => $row['updated_at']
        ]);
    }

    public function headingRow(): int
    {
        return 1;
    }
}

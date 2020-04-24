<?php

use Illuminate\Database\Seeder;

class OrderProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                 'order_id' => '1',
                 'product_id' => '2',
                 'quantity' => '2',
                 'price' => '100',
            ],
            [
                'order_id' => '1',
                'product_id' => '2',
                'quantity' => '2',
                'price' => '100',
           ]
        ];
 
        DB::table('order_products')->insert($data);
    }
}

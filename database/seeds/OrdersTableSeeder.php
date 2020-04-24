<?php

use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder
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
                'total_price' => '200',
                'customer_name' => 'Thien',
                'address' => 'Da Nang City',
                'phone' => '0975552480',
                'email' => 'thientrankhh@gmail.com',
                'order_notes' => '',
                'order_date' => '2020-04-24',
                'order_status' => '0'
           ]
       ];

       DB::table('orders')->insert($data);
    }
}

<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $description = '<p align="justify">boAt BassHeads 100 Stereo In-Ear Earphones are designed to give you an experience which no other product can match. As the headphones feature 10mm drivers, they give you clear sound with that enhanced bass. In built noise isolation mic ensures you don’t miss those important calls. To use Alexa, simply download & install the “boAt Lifestyle” App from Google Play Store and follow the setup instructions</p><p align="justify">boAt BassHeads 100 Stereo In-Ear Earphones are designed to give you an experience which no other product can match. As the headphones feature 10mm drivers, they give you clear sound with that enhanced bass. In built noise isolation mic ensures you don’t miss those important calls. To use Alexa, simply download & install the “boAt Lifestyle” App from Google Play Store and follow the setup instructions</p>';
        $configuration = '
        <table border="1" cellpadding="1" cellspacing="1" style="width:100%">
            <tbody>
                <tr>
                    <td>Brand</td>
                    <td><strong>Boat</strong></td>
                </tr>
                <tr>
                    <td>Model</td>
                    <td><strong>BassHeads 100</strong></td>
                </tr>
                <tr>
                    <td>Item Weight</td>
                    <td><strong>31.8 g</strong></td>
                </tr>
                <tr>
                    <td>Product Dimensions</td>
                    <td><strong>120 x 0.1 x 0.2 cm</strong></td>
                </tr>
            </tbody>
        </table>';

        $data = [
            [
                'product_name' => 'boAt BassHeads 100 Hawk Inspired Earphones with Mic (Furious Red)',
                'quantity' => '100',
                'description' => $description,
                'configuration' => $configuration,
                'images' => 'img01.jpg',
                'price' => '50',
            ],
            [
                'product_name' => 'Mi Earphone Basic with Ultra deep bass and mic (Black)',
                'quantity' => '50',
                'description' => $description,
                'configuration' => $configuration,
                'images' => 'img02.jpg',
                'price' => '70',
            ],
            [
                'product_name' => 'pTron Bassbuds in-Ear True Wireless Bluetooth Headphones (TWS) with Mic - (Black)',
                'quantity' => '100',
                'description' => $description,
                'configuration' => $configuration,
                'images' => 'img03.jpg',
                'price' => '50',
            ],
            [
                'product_name' => 'Realme Buds Wireless',
                'quantity' => '100',
                'description' => $description,
                'configuration' => $configuration,
                'images' => 'img04.jpg',
                'price' => '50',
            ],
            [
                'product_name' => 'Sennheiser CX 80s in Ear Earphone with Mic',
                'quantity' => '100',
                'description' => $description,
                'configuration' => $configuration,
                'images' => 'img05.jpg',
                'price' => '50',
            ],
            [
                'product_name' => 'Mi Earphone Basic with Ultra deep bass and mic (Blue)',
                'quantity' => '100',
                'description' => $description,
                'configuration' => $configuration,
                'images' => 'img06.jpg',
                'price' => '60',
            ],
            [
                'product_name' => 'Sony MDR-ZX110A On-Ear Stereo Headphones (White), without mic',
                'quantity' => '100',
                'description' => $description,
                'configuration' => $configuration,
                'images' => 'img07.jpg',
                'price' => '65',
            ],
            [
                'product_name' => '',
                'quantity' => '100',
                'description' => $description,
                'configuration' => $configuration,
                'images' => 'img08.jpg',
                'price' => '50',
            ]
        ];

        DB::table('products')->insert($data);
    }
}

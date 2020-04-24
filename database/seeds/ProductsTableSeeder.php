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
        $data = [
            [
                'product_name' => 'boAt BassHeads 100 Hawk Inspired Earphones with Mic (Furious Red)',
                'quantity' => '100',
                'description' => 'boAt BassHeads 100 Stereo In-Ear Earphones are designed to give you an experience which no other product can match. As the headphones feature 10mm drivers, they give you clear sound with that enhanced bass. In built noise isolation mic ensures you don’t miss those important calls. To use Alexa, simply download & install the “boAt Lifestyle” App from Google Play Store and follow the setup instructions',
                'configuation' => '-Brand: Boat  -Model: BassHeads 100 -Item Weight: 31.8 g -Product Dimensions: 120 x 0.1 x 0.2 cm ',
                'images' => 'img01.jpg',
                'colors' => 'white',
                'price' => '50',
            ],
            [
                'product_name' => 'Mi Earphone Basic with Ultra deep bass and mic (Black)',
                'quantity' => '50',
                'description' => '-Tangle free cable -Brand: Mi -Model Name:Mi Earphones Basic',
                'configuation' => '-Brand: Boat  -Model: BassHeads 100 -Item Weight: 31.8 g -Product Dimensions: 120 x 0.1 x 0.2 cm ',
                'images' => 'img02.jpg',
                'colors' => 'black',
                'price' => '70',
            ],
            [
                'product_name' => 'pTron Bassbuds in-Ear True Wireless Bluetooth Headphones (TWS) with Mic - (Black)',
                'quantity' => '100',
                'description' => 'boAt BassHeads 100 Stereo In-Ear Earphones are designed to give you an experience which no other product can match. As the headphones feature 10mm drivers, they give you clear sound with that enhanced bass. In built noise isolation mic ensures you don’t miss those important calls. To use Alexa, simply download & install the “boAt Lifestyle” App from Google Play Store and follow the setup instructions',
                'configuation' => '-Brand: Boat  -Model: BassHeads 100 -Item Weight: 31.8 g -Product Dimensions: 120 x 0.1 x 0.2 cm ',
                'images' => 'img03.jpg',
                'colors' => 'white',
                'price' => '50',
            ],
            [
                'product_name' => 'Realme Buds Wireless',
                'quantity' => '100',
                'description' => 'boAt BassHeads 100 Stereo In-Ear Earphones are designed to give you an experience which no other product can match. As the headphones feature 10mm drivers, they give you clear sound with that enhanced bass. In built noise isolation mic ensures you don’t miss those important calls. To use Alexa, simply download & install the “boAt Lifestyle” App from Google Play Store and follow the setup instructions',
                'configuation' => '-Brand: Boat  -Model: BassHeads 100 -Item Weight: 31.8 g -Product Dimensions: 120 x 0.1 x 0.2 cm ',
                'images' => 'img04.jpg',
                'colors' => 'white',
                'price' => '50',
            ],
            [
                'product_name' => 'Sennheiser CX 80s in Ear Earphone with Mic',
                'quantity' => '100',
                'description' => 'boAt BassHeads 100 Stereo In-Ear Earphones are designed to give you an experience which no other product can match. As the headphones feature 10mm drivers, they give you clear sound with that enhanced bass. In built noise isolation mic ensures you don’t miss those important calls. To use Alexa, simply download & install the “boAt Lifestyle” App from Google Play Store and follow the setup instructions',
                'configuation' => '-Brand: Boat  -Model: BassHeads 100 -Item Weight: 31.8 g -Product Dimensions: 120 x 0.1 x 0.2 cm ',
                'images' => 'img05.jpg',
                'colors' => 'white',
                'price' => '50',
            ],
            [
                'product_name' => 'Mi Earphone Basic with Ultra deep bass and mic (Blue)',
                'quantity' => '100',
                'description' => 'boAt BassHeads 100 Stereo In-Ear Earphones are designed to give you an experience which no other product can match. As the headphones feature 10mm drivers, they give you clear sound with that enhanced bass. In built noise isolation mic ensures you don’t miss those important calls. To use Alexa, simply download & install the “boAt Lifestyle” App from Google Play Store and follow the setup instructions',
                'configuation' => '-Brand: Boat  -Model: BassHeads 100 -Item Weight: 31.8 g -Product Dimensions: 120 x 0.1 x 0.2 cm ',
                'images' => 'img06.jpg',
                'colors' => 'white',
                'price' => '60',
            ],
            [
                'product_name' => 'Sony MDR-ZX110A On-Ear Stereo Headphones (White), without mic',
                'quantity' => '100',
                'description' => 'boAt BassHeads 100 Stereo In-Ear Earphones are designed to give you an experience which no other product can match. As the headphones feature 10mm drivers, they give you clear sound with that enhanced bass. In built noise isolation mic ensures you don’t miss those important calls. To use Alexa, simply download & install the “boAt Lifestyle” App from Google Play Store and follow the setup instructions',
                'configuation' => '-Brand: Boat  -Model: BassHeads 100 -Item Weight: 31.8 g -Product Dimensions: 120 x 0.1 x 0.2 cm ',
                'images' => 'img07.jpg',
                'colors' => 'white',
                'price' => '65',
            ],
            [
                'product_name' => '',
                'quantity' => '100',
                'description' => 'boAt BassHeads 100 Stereo In-Ear Earphones are designed to give you an experience which no other product can match. As the headphones feature 10mm drivers, they give you clear sound with that enhanced bass. In built noise isolation mic ensures you don’t miss those important calls. To use Alexa, simply download & install the “boAt Lifestyle” App from Google Play Store and follow the setup instructions',
                'configuation' => '-Brand: Boat  -Model: BassHeads 100 -Item Weight: 31.8 g -Product Dimensions: 120 x 0.1 x 0.2 cm ',
                'images' => 'img08.jpg',
                'colors' => 'white',
                'price' => '50',
            ]
        ];

        DB::table('products')->insert($data);
    }
}

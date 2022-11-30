<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::insert([
            [
                'name'  => 'Product 1',
                'sku'   => 'SKU-1',
                'qty'   => 5,
                'price' => 125
            ],
            [
                'name'  => 'Product 2',
                'sku'   => 'SKU-2',
                'qty'   => 5,
                'price' => 125
            ],
            [
                'name'  => 'Product 3',
                'sku'   => 'SKU-3',
                'qty'   => 5,
                'price' => 125
            ],
            [
                'name'  => 'Product 4',
                'sku'   => 'SKU-4',
                'qty'   => 5,
                'price' => 125
            ],
            [
                'name'  => 'Product 5',
                'sku'   => 'SKU-5',
                'qty'   => 5,
                'price' => 125
            ]
        ]);
    }
}

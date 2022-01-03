<?php

namespace Database\Seeders;

use App\Models\ProductDetail;
use Illuminate\Database\Seeder;

class productDetailSeeder extends Seeder
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
                'product_id' => 1,
                'product_code' => '0001',
                'product_price' => '12000',
                'product_description' => 'lorem ipsum dolor sit amet',
            ],
            [
                'product_id' => 2,
                'product_code' => '0002',
                'product_price' => '3000',
                'product_description' => 'lorem ipsum dolor sit amet',
            ],
            [
                'product_id' => 3,
                'product_code' => '0003',
                'product_price' => '5000',
                'product_description' => 'lorem ipsum dolor sit amet',
            ],
            [
                'product_id' => 4,
                'product_code' => '0004',
                'product_price' => '4000',
                'product_description' => 'lorem ipsum dolor sit amet',
            ],
            [
                'product_id' => 5,
                'product_code' => '0005',
                'product_price' => '34000',
                'product_description' => 'lorem ipsum dolor sit amet',
            ],
            [
                'product_id' => 6,
                'product_code' => '0006',
                'product_price' => '54000',
                'product_description' => 'lorem ipsum dolor sit amet',
            ],
        ];

        foreach ($data as $key => $value) {
            ProductDetail::create([
                'product_id' => $value['product_id'],
                'product_code' => $value['product_code'],
                'product_price' => $value['product_price'],
                'product_description' => $value['product_description'],
            ]);
        }
    }
}

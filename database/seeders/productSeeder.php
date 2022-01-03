<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class productSeeder extends Seeder
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
                'product_name' => 'Nugget Special',
                'category_id' => 1
            ],
            [
                'product_name' => 'Mie Goreng',
                'category_id' => 1
            ],
            [
                'product_name' => 'Es Krim Melon',
                'category_id' => 2
            ],
            [
                'product_name' => 'Es Teh Cup',
                'category_id' => 2
            ],
            [
                'product_name' => 'Kaos Polos',
                'category_id' => 3
            ],
            [
                'product_name' => 'Kaos Distro',
                'category_id' => 3
            ],
        ];

        foreach ($data as $key => $value) {
            Product::create([
                'product_name' => $value['product_name'],
                'category_id' => $value['category_id']
            ]);
        }
    }
}

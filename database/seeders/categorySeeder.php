<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class categorySeeder extends Seeder
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
                'name' => 'Makanan'
            ],
            [
                'name' => 'Minuman'
            ],
            [
                'name' => 'Pakaian'
            ],
            [
                'name' => 'Hoby'
            ],
            [
                'name' => 'Elektronik'
            ],
            [
                'name' => 'Olahraga'
            ],
        ];

        foreach ($data as $key => $value) {
            Category::create(['name' => $value['name']]);
        }
    }
}

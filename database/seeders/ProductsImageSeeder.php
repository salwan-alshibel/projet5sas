<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products_images')->insert([
            'product_id' => 1,
            'first_img' => "Beasts_of_Chaos_01.webp",
            'second_img' => "Beasts_of_Chaos_02.webp",
            'third_img' => NULL,
            'fourth_img' => NULL,
            'fifth_img' => NULL,
            'sixth_img' => NULL,
        ]);
    }
}

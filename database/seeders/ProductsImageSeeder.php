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
            '1st_img' => "Beasts_of_Chaos_01.webp",
            '2nd_img' => "Beasts_of_Chaos_02.webp",
            '3rd_img' => NULL,
            '4th_img' => NULL,
            '5th_img' => NULL,
            '6th_img' => NULL,
        ]);
    }
}

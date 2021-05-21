<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'user_id' => NULL,
            'title' => 'Sorts persistants: Beasts of Chaos',
            'metaTitle' => 'Beasts of Chaos',
            'slug' => 'Battlemagic-Beasts-Of-Chaos-2018',
            'summary' => 'Ce kit plastique contient les composants nécessaires pour assembler 3 Sorts Persistants utilisables par les sorciers Beasts of Chaos dans les parties de Warhammer Age of Sigmar.' ,
            'type' => NULL,	
            'sku' => 10,
            'price'	=> 30,
            'discount' =>	0,	
            'quantity' =>	9,
            'shop' => 1,
            'created_at' => date(now()),
            'updated_at' => date(now()),	
            'published_at' => date(now()),	
            'starts_at' => NULL,
            'ends_at' => NULL,
            'content' => 'content test',
            'sellQuantity' => 0,
            'category_id' => 1,
        ]);
    }
}

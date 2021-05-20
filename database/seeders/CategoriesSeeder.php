<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'name' => "Warhammer age of sigmar",
                'image' => "warhammer_age_of_sigmar_logo.webp",
                'online' => 1,
                'created_at' => date(now()),
                'updated_at' => date(now()),
            ],

            [
                'name' => "Warhammer 40000",
                'image' => "warhammer_40000_logo.webp",
                'online' => 1,
                'created_at' => date(now()),
                'updated_at' => date(now()),
            ],

            [
                'name' => "Peintures",
                'image' => "peintures_logo.jpg",
                'online' => 1,
                'created_at' => date(now()),
                'updated_at' => date(now()),
            ]
        ]);
    }
}

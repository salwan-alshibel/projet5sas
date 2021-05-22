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
                'name' => "Peintures et Accesoires",
                'image' => "peintures_logo.jpg",
                'online' => 1,
                'created_at' => date(now()),
                'updated_at' => date(now()),
            ]

            [
                'name' => "Order",
                'image' => NULL,
                'online' => 1,
                'parent_id' => 1,
                'created_at' => date(now()),
                'updated_at' => date(now()),
            ],

            [
                'name' => "Chaos",
                'image' => NULL,
                'online' => 1,
                'parent_id' => 1,
                'created_at' => date(now()),
                'updated_at' => date(now()),
            ],

            [
                'name' => "Death",
                'image' => NULL,
                'online' => 1,
                'parent_id' => 1,
                'created_at' => date(now()),
                'updated_at' => date(now()),
            ],

            [
                'name' => "Space Marines",
                'image' => NULL,
                'online' => 1,
                'parent_id' => 2,
                'created_at' => date(now()),
                'updated_at' => date(now()),
            ],

            [
                'name' => "Imperium",
                'image' => NULL,
                'online' => 1,
                'parent_id' => 2,
                'created_at' => date(now()),
                'updated_at' => date(now()),
            ],

            [
                'name' => "Chaos Armies",
                'image' => NULL,
                'online' => 1,
                'parent_id' => 2,
                'created_at' => date(now()),
                'updated_at' => date(now()),
            ],

            [
                'name' => "Peintures",
                'image' => NULL,
                'online' => 1,
                'parent_id' => 3,
                'created_at' => date(now()),
                'updated_at' => date(now()),
            ],

            [
                'name' => "Pinceaux",
                'image' => NULL,
                'online' => 1,
                'parent_id' => 3,
                'created_at' => date(now()),
                'updated_at' => date(now()),
            ],

            [
                'name' => "Accessoires",
                'image' => NULL,
                'online' => 1,
                'parent_id' => 3,
                'created_at' => date(now()),
                'updated_at' => date(now()),
            ]
        ]);
    }
}

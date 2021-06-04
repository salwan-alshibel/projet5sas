<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->insert([
            [
                'name' => "#Nouveauté",
            ],

            [
                'name' => "#Promo",
            ],

            [
                'name' => "#Carrousel",
            ],
        ]);
    }
}

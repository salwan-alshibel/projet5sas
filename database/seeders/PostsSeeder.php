<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            [
            'product_id' => 1,
            'user_id' => 2,
            'body' => "Excellent article. Je le recommande !",
            'created_at' => date(now()),
            'updated_at' => date(now()),
            ],
            [
            'product_id' => 1,
            'user_id' => 2,
            'body' => "Un peu trop cher !",
            'created_at' => date(now()),
            'updated_at' => date(now()),
            ],
            [
            'product_id' => 1,
            'user_id' => 3,
            'body' => "Au contraire ! C'est le juste prix !",
            'created_at' => date(now()),
            'updated_at' => date(now()),
            ],
            [
            'product_id' => 2,
            'user_id' => 2,
            'body' => "Toujours au top !",
            'created_at' => date(now()),
            'updated_at' => date(now()),
            ],
            [
            'product_id' => 3,
            'user_id' => 2,
            'body' => "Toujours au top !",
            'created_at' => date(now()),
            'updated_at' => date(now()),
            ],
            [
            'product_id' => 4,
            'user_id' => 2,
            'body' => "Excellent article. Je le recommande !",
            'created_at' => date(now()),
            'updated_at' => date(now()),
            ],
            [
            'product_id' => 5,
            'user_id' => 2,
            'body' => "Un peu petit mais magnifique !",
            'created_at' => date(now()),
            'updated_at' => date(now()),
            ],
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
            'name' => 'George Dupont',
            'email' => 'george.dupont@emailfictif.com',
            'email_verified_at' => NULL,
            'password' => Hash::make('1234'),
            'created_at' => date(now()),
            'updated_at' => date(now()),
            'username' => 'Dupont',
            'admin' => 0,
            ],
            [
            'name' => 'Christophe Laforet',
            'email' => 'christophe.laforet@emailfictif.com',
            'email_verified_at' => NULL,
            'password' => Hash::make('1234'),
            'created_at' => date(now()),
            'updated_at' => date(now()),
            'username' => 'Laforet',
            'admin' => 0,
            ],
            [
            'name' => 'Admin',
            'email' => 'admin@emailfictif.com',
            'email_verified_at' => NULL,
            'password' => Hash::make('1234'),
            'created_at' => date(now()),
            'updated_at' => date(now()),
            'username' => 'Admin',
            'admin' => 1,
            ],
        ]);
    }
}

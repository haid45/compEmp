<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => env('INITIAL_USER_NAME','Administrator'),
            'email' => env('INITIAL_USER_EMAIL','admin@admin.com'),
            'password' => Hash::make(env('INITIAL_USER_PASSWORDHASH','password')),
        ]);
    }
}

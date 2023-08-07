<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->insert([
            'firstname' => 'admin',
            'lastname' => 'admin',
            'role' => 'admin',
            'phone' => '1231231233',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
        ]);
    }
}
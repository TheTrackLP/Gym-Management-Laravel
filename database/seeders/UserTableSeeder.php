<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'member_id' => '123123',
                'email' => 'admin@gmail.com',
                'password' => Hash::make(111),
                'role' => 'admin',
            ],
        ]);
    }
}
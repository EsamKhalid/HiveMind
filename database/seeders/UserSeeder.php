<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
       DB::table('users')->insert([
            'first_name' => "chungus",
            'last_name' => "user",
            'email_address' => "test@user.com",
            'phone_number' => 0,
            'password' => bcrypt("password")
        ]);
    }
}

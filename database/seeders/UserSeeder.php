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
            [
                'first_name' => "test",
                'last_name' => "user",
                'email_address' => "test@user.com",
                'phone_number' => 0,
                'password' => bcrypt("password"),
                'memorable_information_question' => "What's your mother's maiden name?",
                'memorable_information' => "test",
                'permission_level' => "user", // Add this line
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'first_name' => "admin",
                'last_name' => "user",
                'email_address' => "admin@user.com",
                'phone_number' => 0,
                'password' => bcrypt("password"),
                'memorable_information_question' => "What's your mother's maiden name?",
                'memorable_information' => "admin",
                'permission_level' => "admin",
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}

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
                'permission_level' => "user", // Add this line
                'memorable_question' => 'test',
                'memorable_answer' => bcrypt("test"),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'first_name' => "admin",
                'last_name' => "user",
                'email_address' => "admin@user.com",
                'phone_number' => 0,
                'password' => bcrypt("password"),
                'permission_level' => "admin",
                'memorable_question' => 'test',
                'memorable_answer' => bcrypT("test"),
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}

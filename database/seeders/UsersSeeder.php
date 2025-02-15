<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('users')->insert([
            ['first_name' => 'Muneeb', 'last_name' => 'Chughtai', 'email_address' => 'muneeb@hivemind.com', 'phone_number' => '07727006547', 'password' => bcrypt('12345678'), 'permission_level' => 'user'],
            ['first_name' => 'Basanta', 'last_name' => 'Kandel', 'email_address' => 'basanta@hivemind.com', 'phone_number' => '07727006547', 'password' => bcrypt('12345678'), 'permission_level' => 'user'],
        ]);

        //
    }
}


<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('suppliers')->insert([
            [
                //'supplier_id',
                'supplier_name' => 'Big Chungus',
                'supplier_email' => 'chungus@user.com',
                'supplier_phone' => '7777',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                //'supplier_id',
                'supplier_name' => 'Mr Beeswax',
                'supplier_email' => 'Beeswax@user.com',
                'supplier_phone' => '8888',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}

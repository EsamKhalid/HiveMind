<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id('id');
            $table->string('report_name');
            $table->date('date_created');
            $table->timestamps();
            $table->string('report_link');
            
        });

        // date added field Report added
        //date picker
        



        DB::table('reports')->insert([
            ['report_name' => 'Annual', 'date_created'=> '2025/09/01','report_link' => 'https://www.php.net/'],['report_name' => 'Annual Report', 'date_created'=> '2024/09/01','report_link' => 'https://herd.laravel.com/windows']
            
            ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};

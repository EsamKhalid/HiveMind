<?php

// Jo'Ardie Richardson's work

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
            $table->timestamps();
            $table->string('report_link');
            
        });

        DB::table('reports')->insert([
            ['report_name' => 'HiveMind 2024 Annual Report', 'created_at'=> now(),'updated_at' => now(),'report_link' => 'pdfs/HiveMind 2024 Annual Report.pdf'],['report_name' => 'HiveMind Marketing Report 2025', 'created_at'=> '2024/09/01','updated_at' => '2024/09/01','report_link' => 'pdfs/HiveMind Marketing Report 2025.pdf']
            
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
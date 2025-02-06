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
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
            //$table->foreignId('product_id')->constrained('products')->onDelete('cascade');
            $table->string('supplier_name');
            $table->string('supplier_email');
            $table->string('supplier_phone');
            $table->timestamps();
        });

        DB::table('users')->insert([['first_name'=> 'test', 'last_name' => 'user', 'email_address' => 'test@user.com', 'phone_number' => '0', 'password' => bcrypt('password')]]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suppliers');
    }
};

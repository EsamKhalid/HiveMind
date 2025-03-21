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
        Schema::create('users', function (Blueprint $table) {
            $table->id('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email_address')->unique();;
            $table->string('phone_number');
            $table->string('password');
            $table->string('memorable_information_question');
            $table->string('memorable_information');
            $table->string('permission_level')->default('user');
            $table->string('memorable_question');
            $table->string('memorable_answer');
            $table->timestamps();    
        });
        //DB::table('users')->insert([['first_name'=> 'test', 'last_name' => 'user', 'email_address' => 'test@user.com', 'phone_number' => '0', 'password' => bcrypt('password')]]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};

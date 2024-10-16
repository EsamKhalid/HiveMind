<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello',function(){
    return 'Hello World!';
   });
   
Route::get('list',[AccountController::class,'list'])->name('list_account');
Route::get('show/{id}', [AccountController::class,'show']);

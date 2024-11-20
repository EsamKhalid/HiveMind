<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;

Route::get('/', function () {
    return view('home');
});


Route::get('test', [TestController::class, 'test'])->name('test');

Route::get('home', [TestController::class, 'home'])->name('home');

Route::get('products', [TestController::class, 'products'])->name('products');
Route::get('contact', [TestController::class, 'contact'])->name('contact');

Route::get('account', [TestController::class, 'account'])->name('account');

Route::get('basket', [TestController::class, 'basket'])->name('basket');

Route::get('about', [TestController::class, 'about'])->name('about');

Route::get('signUp', [TestController::class, 'signUp'])->name('signUp');


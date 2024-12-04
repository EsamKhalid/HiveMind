<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrderController;

Route::get('/', function () {
    return view('home');
})->name('home');


Route::get('test', [TestController::class, 'test'])->name('test');
Route::get('home', [TestController::class, 'home'])->name('home');
Route::get('products', [TestController::class, 'products'])->name('products');
Route::get('contact', [TestController::class, 'contact'])->name('contact');
Route::get('account', [TestController::class, 'account'])->name('account');
Route::get('basket', [TestController::class, 'basket'])->name('basket');
Route::get('about', [TestController::class, 'about'])->name('about');

// Route::view('/login', 'login.login')->name('login');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');

Route::get('/orders', [OrderController::class, 'index'])->name('orders');
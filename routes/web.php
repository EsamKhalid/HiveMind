<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SignupController;


Route::get('/', function () {
    return view('home');
});


Route::get('test', [TestController::class, 'test'])->name('test');

Route::get('home', [TestController::class, 'home'])->name('home');

//Route::get('products', [TestController::class, 'products'])->name('products');
Route::get('contact', [TestController::class, 'contact'])->name('contact');



Route::get('account', [TestController::class, 'account'])->name('account');

Route::get('basket', [TestController::class, 'basket'])->name('basket');

Route::get('about', [TestController::class, 'about'])->name('about');
Route::get('checkout', [TestController::class, 'checkout'])->name('checkout');


// routes for login page
// Route::view('/login', 'login.login')->name('login');
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');

Route::get('list',[UserController::class,'list'])->name('list_user');
//Route::get('show/{id}', [UserController::class,'show']);



//Route::get('products',[ProductController::class,'list'])->name('products');
Route::get('products',[ProductController::class,'list'])->name('products');
Route::get('products/{id}', [ProductController::class, 'show'])->name('products.show'); 

Route::get('account',[UserController::class,'account'])->name('account');

Route::get('logout', [LoginController::class, 'logout'])->name('logout');


// for orders page
Route::get('/orders', [OrderController::class, 'index'])->name('orders');

Route::get('products/{id}', [ProductController::class, 'show'])->name('products.show'); 


// for signup page
Route::get('signup', [SignupController::class, 'signup'])->name('signup');
Route::post('signup', [SignupController::class, 'store'])->name('signup.store');   


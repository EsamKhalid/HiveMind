<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\LoginController;

Route::get('/', function () {
    return view('home');
});


Route::get('test', [TestController::class, 'test'])->name('test');

Route::get('home', [TestController::class, 'home'])->name('home');

//Route::get('products', [TestController::class, 'products'])->name('products');
Route::get('contact', [TestController::class, 'contact'])->name('contact');

Route::get('account', [TestController::class, 'account'])->name('account');


Route::get('about', [TestController::class, 'about'])->name('about');

// routes for login page
// Route::view('/login', 'login.login')->name('login');
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');

Route::get('list',[UserController::class,'list'])->name('list_user');
//Route::get('show/{id}', [UserController::class,'show']);


/**Middleware is a mehcnism that allows you to perform actions such as authentication, logging, validaition and such 
 * before or after the request is processed by your controller. Ultimately, it acts as a bridge between request and a response. */



    Route::get('basket',[BasketController::class, 'view'])->name('basket.view');

    Route::post('/basket/add/{productID}',[BasketController::class, 'addToBasket'])->name('basket.add');

    Route::delete('products/remove/{productID}',[BasketController::class, 'removeFromBasket'])->name('basket.remove');


//Route::get('products',[ProductController::class,'list'])->name('products');
Route::get('products',[ProductController::class,'list'])->name('products');
Route::get('products/{id}', [ProductController::class, 'show'])->name('products.show'); 

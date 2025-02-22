<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DetailsController;

use App\Http\Controllers\BasketController;
use App\Http\Controllers\adminDashboardController;
Route::get('/', function () {
    return view('home');
});


Route::get('test', [TestController::class, 'test'])->name('test');

Route::get('home', [TestController::class, 'home'])->name('home');

//Route::get('products', [TestController::class, 'products'])->name('products');



Route::get('account', [TestController::class, 'account'])->name('account');


Route::get('about', [TestController::class, 'about'])->name('about');

// routes for login page
// Route::view('/login', 'login.login')->name('login');
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');

Route::get('list',[UserController::class,'list'])->name('list_user');
//Route::get('show/{id}', [UserController::class,'show']);



//Route::get('products',[ProductController::class,'list'])->name('products');
Route::get('products',[ProductController::class,'list'])->name('products');
Route::get('products/{id}', [ProductController::class, 'show'])->name('products.show'); 

Route::get('account',[UserController::class,'view'])->name('account');

Route::get('logout', [LoginController::class, 'logout'])->name('logout');


// for orders page
Route::get('/orders', [OrderController::class, 'index'])->name('orders');

Route::get('products/{id}', [ProductController::class, 'show'])->name('products.show'); 


// for signup page
Route::get('signup.signup', [SignupController::class, 'signup'])->name('signup');
Route::post('signup.signup', [SignupController::class, 'store'])->name('signup.store');   

Route::get('products',[ProductController::class,'list'])->name('products');

// for admin page
Route::get('/admin-dashboard', [AdminDashboardController::class, 'dashboard'])->name('admin-dashboard');
Route::get('/user-management', [AdminDashboardController::class, 'manageusers'])->name('user-management');

/**Middleware is a mechanism that allows you to perform actions such as authentication, logging, validaition and such 
 * before or after the request is processed by your controller. Ultimately, it acts as a bridge between request and a response. */



    Route::get('basket',[BasketController::class, 'view'])->name('basket.view');

   // Route::get('basket',[BasketController::class, 'updateQuantity'])->name('basket.updateQuantity');
   Route::post('basket/update-quantity',[BasketController::class, 'updateQuantity'])->name('basket.updateQuantity');

   Route::post('basket/remove',[BasketController::class, 'removeFromBasket'])->name('basket.remove');
   Route::post('basket/increaseQuantity',[BasketController::class,'increaseQuantity'])->name('basket.increaseQuantity');
   Route::post('basket/decreaseQuantity',[BasketController::class,'decreaseQuantity'])->name('basket.decreaseQuantity');

   Route::post('basket/add',[BasketController::class, 'addToBasket'])->name('basket.add');


    //Route::post('/basket/add/{productID}',[BasketController::class, 'addToBasket'])->name('basket.add');

    //Route::delete('/basket/remove/{productID}',[BasketController::class, 'removeFromBasket'])->name('basket.remove');
    Route::get('checkout', [CheckoutController::class, 'view'])->name('checkout.view');  

    Route::post('checkout/save-address', [CheckoutController::class, 'storeAddress'])->name('checkout.storeAddress');
    Route::get('checkout/confirmation', [CheckoutController::class, 'confirmation'])->name('checkout.confirmation');
    Route::get('checkout/checkout',[CheckoutController::class, 'checkout'])->name('checkout.checkout');

    Route::get('contact', [ContactController::class, 'view'])->name('contact');
    Route::post('contact', [ContactController::class, 'store'])->name('contact.store');

    // Routes for details page - Aryan
    Route::get('details', [DetailsController::class, 'view'])->name('user.details');
    Route::post('details/update', [DetailsController::class, 'update'])->name('user.details.update');
    
    // Routes for return order functionality - Aryan
    Route::get('/orders/{id}/return', [OrderController::class, 'showReturnForm'])->name('orders.return');
    Route::post('/orders/{id}/return', [OrderController::class, 'submitReturnRequest'])->name('orders.return.submit');


    Route::get('terms', [UserController::class, 'terms'])->name('user.terms');
    Route::get('settings', [UserController::class, 'settings'])->name('user.settings');

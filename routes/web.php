<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\PasswordResetController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DetailsController;
use App\Http\Controllers\SettingsController;


use App\Http\Controllers\BasketController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\SupplierController;

use App\Http\Controllers\AdminController;



use App\Http\Controllers\ReviewController;

use App\Http\Controllers\AdminOrderController;


use App\Http\Controllers\UserManagementController;

// Jo'Ardie Richardson's work
use App\Http\Controllers\ReportController;
// end
use App\Http\Controllers\EnquiriesController;

use App\Http\Controllers\GuestOrderController;

use App\Http\Controllers\WishlistController;

use App\Http\Controllers\StatisticsController;


Route::get('/', function () {
    return view('home');
});


Route::get('test', [TestController::class, 'test'])->name('test');

Route::get('home', [TestController::class, 'home'])->name('home');

//Route::get('products', [TestController::class, 'products'])->name('products');



Route::get('account', [TestController::class, 'account'])->name('account');


Route::get('about', [TestController::class, 'about'])->name('about');

Route::get('terms', [TestController::class, 'terms'])->name('terms');

Route::get('faq', [TestController::class, 'faq'])->name('faq'); 

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

// view wishlist
Route::get('wishlist.wishlist',[TestController::class,'wishlist'])->name('wishlist');


//Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

Route::get('/admin/user-management', [UserManagementController::class, 'view'])->name('admin.user-management');

Route::get('/admin/user-management/user/{id}', [UserManagementController::class, 'show'])->name('admin.view-user');


Route::patch('/admin/user-management/user/update/{id}', [UserManagementController::class, 'update'])->name('admin.view-user.update');
Route::delete('/admin/user-management/user/delete/{id}', [UserManagementController::class, 'delete'])->name('admin.view-user.delete');

// Jo'Ardie Richardson's work
Route::get('/admin/reports',[ReportController::class,'list'])->name('admin.reports');
// end

Route::middleware(['admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('admin/inventory', [InventoryController::class, 'list'])->name('admin.inventory');
    Route::get('admin/inventory/order/{id}', [InventoryController::class, 'show'])->name('admin.show'); 

    //Route::patch('admin/order', [InventoryController::class, 'order'])->name('admin.order'); 

    Route::post('admin/inventory', [InventoryController::class, 'order'])->name('admin.order');
    Route::get('/admin/notifications', [AdminController::class, 'notifications'])->name('admin.notifications');



    Route::get('admin/supplier', [SupplierController::class, 'view'])->name('supplier.view');
    Route::get('admin/supplier', [SupplierController::class, 'list'])->name('supplier.list');
    Route::post('admin/supplier', [SupplierController::class, 'addSupplier'])->name('supplier.create');
    
    // View and process user orders - Aryan
    Route::get('adminOrder', [AdminOrderController::class, 'index'])->name('admin.adminOrder');
    Route::patch('adminOrder/{order}/process', [AdminOrderController::class, 'processOrder'])
        ->name('admin.orders.update');
    Route::patch('/admin/orders/processAll', [AdminOrderController::class, 'processAllOrders'])->name('admin.orders.processAll');
    
    // View, approve or deny return requests - Aryan
    Route::get('admin/orders/{order}/return-request', [AdminOrderController::class, 'returnRequest'])->name('admin.returnRequest');
    Route::put('admin/returns/{returnRequest}/approve', [AdminOrderController::class, 'approveReturn'])->name('admin.return.approve');
    Route::put('admin/returns/{returnRequest}/deny', [AdminOrderController::class, 'denyReturn'])->name('admin.return.deny');

    Route::get('admin/userEnquiries', [EnquiriesController::class, 'view'])->name('admin.userEnquiries');
    Route::get('admin/statistics', [StatisticsController::class, 'view'])->name('admin.statistics');
});



/**Middleware is a mechanism that allows you to perform actions such as authentication, logging, validaition and such 
 * before or after the request is processed by your controller. Ultimately, it acts as a bridge between request and a response. */



    Route::get('orders/guest/validate', [GuestOrderController::class, 'view'])->name('orders.guest.validate');
    Route::get('orders/guest/getOrder', [GuestOrderController::class, 'getOrder'])->name('orders.guest.getOrder');
    Route::get('orders/guest/displayOrder/{confnum}/{surname}', [GuestOrderController::class, 'displayOrder'])->name('orders.guest.displayOrder');



    Route::get('basket',[BasketController::class, 'view'])->name('basket.view');

   // Route::get('basket',[BasketController::class, 'updateQuantity'])->name('basket.updateQuantity');
   Route::post('basket/update-quantity',[BasketController::class, 'updateQuantity'])->name('basket.updateQuantity');

   Route::post('basket/remove',[BasketController::class, 'removeFromBasket'])->name('basket.remove');
   Route::post('basket/increaseQuantity',[BasketController::class,'increaseQuantity'])->name('basket.increaseQuantity');
   Route::post('basket/decreaseQuantity',[BasketController::class,'decreaseQuantity'])->name('basket.decreaseQuantity');

   Route::post('basket/add',[BasketController::class, 'addToBasket'])->name('basket.add');
   Route::post('basket/transfer',[BasketController::class, 'transferBasket'])->name('basket.transfer');
   Route::get('basket/transfer',[BasketController::class, 'transferBasket'])->name('basket.transfer');

    //Route::post('/basket/add/{productID}',[BasketController::class, 'addToBasket'])->name('basket.add');

    //Route::delete('/basket/remove/{productID}',[BasketController::class, 'removeFromBasket'])->name('basket.remove');
    Route::get('checkout', [CheckoutController::class, 'view'])->name('checkout.view');  

    Route::post('checkout/save-address', [CheckoutController::class, 'storeAddress'])->name('checkout.storeAddress');
    Route::post('checkout/save-guest', [CheckoutController::class, 'storeGuest'])->name('checkout.storeGuest');
    Route::get('checkout/confirmation/{confNum}', [CheckoutController::class, 'confirmation'])->name('checkout.confirmation');
    Route::get('checkout/checkout',[CheckoutController::class, 'checkout'])->name('checkout.checkout');
    //Route::get('checkout/checkoutBilling',[CheckoutController::class, 'billing'])->name('checkout.billing');
    Route::post('checkout/storeBillingAddress', [CheckoutController::class, 'storeBillingAddress'])->name('checkout.storeBillingAddress');

    Route::get('contact', [ContactController::class, 'view'])->name('contact.view');
    Route::post('contact', [ContactController::class, 'store'])->name('contact.store');

    // Routes for Details page - Aryan
    Route::get('details', [DetailsController::class, 'view'])->name('user.details');
    Route::post('details/update', [DetailsController::class, 'update'])->name('user.details.update');
    
    // Routes for Return Order Functionality - Aryan
    Route::get('/orders/{id}/return', [OrderController::class, 'showReturnForm'])->name('orders.return');
    Route::post('/orders/{id}/return', [OrderController::class, 'returnRequest'])->name('orders.return.submit');
    Route::post('/orders/{id}/cancel-return', [OrderController::class, 'cancelReturn'])->name('orders.cancelReturn');
     
    // Route for Cancel Order Functionality - Aryan
    Route::delete('/orders/{id}/cancel', [OrderController::class, 'cancelOrder'])->name('orders.cancel');

    // Route for Password Recovery Functionality - Aryan
    Route::get('/password/recover', [PasswordResetController::class, 'showRecoveryForm'])->name('password.recover');
    Route::post('/password/recover', [PasswordResetController::class, 'processRecovery']);
    Route::post('/password/verify', [PasswordResetController::class, 'verifyAnswer'])->name('password.verifyAnswer');
    Route::get('/password/resetForm', [PasswordResetController::class, 'resetForm'])->name('password.resetForm');
    Route::post('/password/reset', [PasswordResetController::class, 'resetPassword'])->name('password.reset');
    
    // Routes to update Memorable information
    Route::get('/settings/security', [SettingsController::class, 'securityView'])->name('settings.security');
    Route::post('/settings/security', [SettingsController::class, 'securityUpdate'])->name('settings.security.update');


    Route::get('settings', [UserController::class, 'settings'])->name('user.settings');


    Route::get('review/siteReview', [ReviewController::class, 'siteReview'])->name('review.siteReview');
    Route::post('review/storeSiteReview', [ReviewController::class, 'storeSiteReview'])->name('review.storeSiteReview');
    Route::get('review/productReview/{id}', [ReviewController::class, 'productReview'])->name('review.productReview');
    Route::post('/review/storeProductReview/{id}', [ReviewController::class, 'storeProductReview'])->name('review.storeProductReview');


    Route::get('wishlist',[WishlistController::class, 'view'])->name('wishlist.view');
    Route::post('wishlist/add',[WishlistController::class, 'addtoWishlist'])->name('wishlist.add');
    Route::post('wishlist/remove',[WishlistController::class, 'removeFromWishlist'])->name('wishlist.remove');
    
    // NOTE FROM HARRY (15/02/25)
    // IF YOU WANT TO USE MY INVENTORY CODE FROM "resources/views/inventory/inventory.blade.php"
    // YOU MIGHT HAVE TO UPDATE THIS ROUTE GET ACCORDINGLY ASSUMING YOU ARE RUNNING FROM "resources/views/admin/inventory.blade.php"

    Route::get('/inventory', [ProductController::class, 'inventory_products']);
    Route::get('admin', [AdminController::class, 'adm'])->name('adm');

     


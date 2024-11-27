<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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

// 27/11/24 - NOT SURE IF THIS IS NEEDED, LEAVING HERE JUST IN CASE
// DO NOT TOUCH THIS, OR OFF WITH YOUR HEAD

Route::post('/generate-password', function (Request $request) 
{
    $length = $request->input('length', 16);
    $hasUpper = $request->input('hasUpper', true);
    $hasLower = $request->input('hasLower', true);
    $hasNums = $request->input('hasNums', true);
    $hasSyms = $request->input('hasSyms', true);

    $characters = '';
    if ($hasUpper) $characters .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    if ($hasLower) $characters .= 'abcdefghijklmnopqrstuvwxyz';
    if ($hasNums) $characters .= '0123456789';
    if ($hasSyms) $characters .= '!@#$%^&*()_+-=[]{}|;:,.<>?';

    if (empty($characters)) {
        return response()->json(['error' => 'No character types selected'], 400);
    }

    $password = Str::random($length);
    $password = substr(str_shuffle($characters), 0, $length);

    return response()->json(['password' => $password]);
});

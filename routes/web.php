<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\WishlistController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('indexProducts/{id}', [HomeController::class, 'indexProducts'])->name('indexProducts');
Route::get('contact', [HomeController::class, 'contact'])->name('contact');

// add to cart ,checkout,wishlist
Route::middleware('auth')->group(function () {
    Route::get('show/{id}', [CartController::class, 'show'])->name('prodShow');
    Route::post('addToCar{id}', [CartController::class, 'addToCart'])->name('addToCart');
    Route::get('ViewCart', [CartController::class, 'ViewCart'])->name('ViewCart');
    Route::get('editCart/{id}', [CartController::class, 'editCart'])->name('editCart');
    Route::post('updateCart/{id}', [CartController::class, 'updateCart'])->name('updateCart');
    Route::get('deleteCart/{id}', [CartController::class, 'deleteCart'])->name('deleteCart');

    Route::get('checkout', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('placeOrder', [CheckoutController::class, 'placeOrder'])->name('placeOrder');
    // Pay With The Razorpay
    Route::post('proceed_to_pay', [CheckoutController::class, 'payWithRazorpay'])->name('payWithRazorpay');
    //   ******
    Route::get('myOrder', [OrderController::class, 'index'])->name('myOrder');
    Route::get('myOrder.show/{id}', [OrderController::class, 'show'])->name('myOrder.show');
    Route::get('myOrder.destroy/{id}', [OrderController::class, 'destroy'])->name('myOrder.destroy');
    Route::get('wishlist', [WishlistController::class, 'index'])->name('wishlist');
    Route::get('addToWishlist/{id}', [WishlistController::class, 'addToWishlist'])->name('addToWishlist');
    Route::get('deleteWishlist/{id}', [WishlistController::class, 'deleteWishlist'])->name('deleteWishlist');

    // cart-count
    Route::get('loadcart', [CartController::class, 'cartCount'])->name('loadcart');
    Route::get('loadwishlist', [WishlistController::class, 'wishlistCount'])->name('loadwishlist');
});

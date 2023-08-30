<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Dashboard\IndexController;
use App\Http\Controllers\Dashboard\SettingController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\OrderController;
use App\Http\Controllers\Dashboard\ProductController;
use App\Http\Controllers\Dashboard\ProductDetailsController;
use App\Http\Controllers\Dashboard\ProfileController;
use App\Http\Controllers\Dashboard\UserDashboardController;
use PHPUnit\TextUI\XmlConfiguration\Group;


Route::prefix('dashboard')->group(function () {
    // go to Dashboard Admin
    Route::get('admin', [IndexController::class, 'index'])->name('admin');
    // **************************** settings Routes ********************** //
    // go to settings page
    Route::get('settings.index', [SettingController::class, 'index'])->name('settings.index')->middleware('CheckAdmin');
    // update settings in database
    Route::post('settings.update/{id}', [SettingController::class, 'update'])->name('settings.update');
    // **************************** categories Routes ********************** //
    // go to categories list page
    Route::get('categories.index', [CategoryController::class, 'index'])->name('categories.index');
    // go to categories create page
    Route::get('categories.create', [CategoryController::class, 'create'])->name('categories.create');
    // store categories in database
    Route::post('categories.store', [CategoryController::class, 'store'])->name('categories.store');
    // go to categories edit page
    Route::get('categories.edit/{id}', [CategoryController::class, 'edit'])->name('categories.edit');
    // update categories in database
    Route::post('categories.update/{id}', [CategoryController::class, 'update'])->name('categories.update');
    // delete categories in database
    Route::get('categories.delete/{id}', [CategoryController::class, 'destroy'])->name('categories.delete');
    // **************************** Products Routes ********************** //
    // go to Products list page
    Route::get('products.index', [ProductController::class, 'index'])->name('products.index');
    // go to Products create page
    Route::get('products.create', [ProductController::class, 'create'])->name('products.create');
    // store Products in database
    Route::post('products.store', [ProductController::class, 'store'])->name('products.store');
    // go to Products edit page
    Route::get('products.edit/{id}', [ProductController::class, 'edit'])->name('products.edit');
    // update Products in database
    Route::post('products.update/{id}', [ProductController::class, 'update'])->name('products.update');
    // delete Products in database
    Route::get('products.delete/{id}', [ProductController::class, 'destroy'])->name('products.delete');

    // **************************** product Details Routes ********************** //
    // go to Add Details to Products page
    Route::get('addDetails', [ProductDetailsController::class, 'create'])->name('products.addDetails');
    // store Products Details in database
    Route::post('storeDetails', [ProductDetailsController::class, 'store'])->name('products.storeDetails');
    // Display the specified resource.
    Route::get('show/{id}', [ProductDetailsController::class, 'show'])->name('products.show');
    Route::get('show.edit/{id}', [ProductDetailsController::class, 'edit'])->name('products.show.edit');
    Route::post('show.update/{id}', [ProductDetailsController::class, 'update'])->name('products.show.update');
    Route::get('show.delete/{id}', [ProductDetailsController::class, 'destroy'])->name('products.show.delete');
    // **************************** Orders  Routes ********************** //
    Route::get('order.index', [OrderController::class, 'index'])->name('order.index');
    Route::get('order.show/{id}', [OrderController::class, 'show'])->name('order.show');
    Route::post('order.update/{id}', [OrderController::class, 'update'])->name('order.update');
    Route::get('historyOrders', [OrderController::class, 'historyOrders'])->name('historyOrders');
    // **************************** UserDashboard Routes ********************** //
    Route::get('users', [UserDashboardController::class, 'users'])->name('users');
    Route::get('showUser/{id}', [UserDashboardController::class, 'showUser'])->name('showUser');
    Route::get('allAdmins', [UserDashboardController::class, 'admins'])->name('allAdmins');
    // **************************** Profile Routes ********************** //
    Route::get('index', [ProfileController::class, 'index'])->name('profile.index');
    Route::post('update', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('updatePassword', [ProfileController::class, 'updatePassword'])->name('profile.updatePassword');
});

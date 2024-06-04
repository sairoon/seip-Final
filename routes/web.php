<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use  App\Http\Controllers\Admin\CategoryController;


Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/category-products', [HomeController::class, 'category'])->name('categories');
Route::get('/product-detail/{id}', [HomeController::class, 'detailProduct'])->name('detail-product');

Route::get('/shopping-cart', [HomeController::class, 'cart'])->name('cart-shopping');
Route::get('/checkout', [HomeController::class, 'checkout'])->name('checkout');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
//    Route::get('/dashboard', function () {return view('dashboard');})->name('dashboard');
    Route::get('/dashboard',[DashboardController::class,'dashboard'])->name('dashboard');

    Route::get('/create-product',[ProductController::class,'create'])->name('product-create');
    Route::post('/new-product',[ProductController::class,'store'])->name('product-store');

    Route::get('/manage-product',[ProductController::class,'index'])->name('product-index');
    Route::get('/edit-product/{id}',[ProductController::class,'edit'])->name('product-edit');
    Route::post('/update-product/{id}',[ProductController::class,'update'])->name('product-update');
    Route::get('/delete-product/{id}',[ProductController::class,'destroy'])->name('product-delete');

    Route::resource('categories', CategoryController::class);
});

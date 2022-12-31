<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/',[HomeController::class,'indexProductList'])->name('indexProductList');
    Route::get('/order-history',[HomeController::class,'orderHistory'])->name('orderHistory');
    Route::get('/order/{idProduct}',[HomeController::class,'createOrder'])->name('createOrder');
    Route::post('/storeOrder',[HomeController::class,'storeOrder'])->name('storeOrder');
    Route::get('/cart',[HomeController::class,'indexCart'])->name('indexCart');
    Route::get('/addToCart/{id}',[HomeController::class,'addToCart'])->name('addToCart');
    Route::get('/destroycart/{id}',[HomeController::class,'destroycart'])->name('destroycart');

    Route::middleware('levelcheck')->group(function(){
        Route::get('/admin/dashboard', [HomeController::class, 'index'])->name('indexdashboard');
        Route::prefix('/admin/dashboard/master')->group(function () {
            Route::prefix('order')->group(function () {
                Route::get('/',[OrderController::class,'index'])->name('indexorder');
                Route::get('/acc/{id}',[OrderController::class,'accorder'])->name('accorder');
                Route::get('/destroy/{id}',[OrderController::class,'destroy'])->name('destroyorder');
            });
            Route::prefix('product')->group(function () {
                Route::get('/',[ProductController::class,'index'])->name('indexproduct');
                Route::get('/create',[ProductController::class,'create'])->name('createproduct');
                Route::post('/store',[ProductController::class,'store'])->name('storeproduct');
                Route::get('/edit/{id}',[ProductController::class,'edit'])->name('editproduct');
                Route::post('/update/{id}',[ProductController::class,'update'])->name('updateproduct');
                Route::get('/destroy/{id}',[ProductController::class,'destroy'])->name('destroyproduct');
            });
            Route::prefix('user')->group(function () {
                Route::get('/',[UserController::class,'index'])->name('indexuser');
                Route::get('/create',[UserController::class,'create'])->name('createuser');
                Route::post('/store',[UserController::class,'store'])->name('storeuser');
                Route::get('/edit/{id}',[UserController::class,'edit'])->name('edituser');
                Route::post('/update/{id}',[UserController::class,'update'])->name('updateuser');
                Route::get('/destroy/{id}',[UserController::class,'destroy'])->name('destroyuser');
            });
        });
    });
});

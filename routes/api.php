<?php

use App\Http\Controllers\API\CartController;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\OrderController;
use App\Http\Controllers\API\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserAuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//guest route
Route::post('register', [UserAuthController::class, 'register']);
Route::post('login', [UserAuthController::class, 'login'])->name('login');
Route::get('categories', [CategoryController::class , 'index'])->name('categories.show');


//protect route
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/detail', [UserAuthController::class, 'detail'])->name('detail');
    Route::post('/logout', [UserAuthController::class, 'logout'])->name('logout');
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');

    Route::get('/carts', [CartController::class, 'index'])->name('carts.index');
    Route::post('/carts', [CartController::class, 'store'])->name('carts.store');
    Route::put('/carts/{id}', [CartController::class, 'update'])->name('carts.update');

    Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
});


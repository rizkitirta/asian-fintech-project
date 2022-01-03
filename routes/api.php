<?php

use App\Http\Controllers\Api\RegisterController;
use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\Product\ProductController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Auth
Route::group(['prefix' => 'auth'], function () {
    Route::post('/register', App\Http\Controllers\Api\RegisterController::class)->name('register');
    Route::post('/login', App\Http\Controllers\Api\LoginController::class)->name('login');
});

//Public API
Route::group(['prefix' => 'public'], function () {
    Route::get('/get-products', [ProductController::class, 'getProduct'])->name('get.product');
    Route::get('/get-categories', [CategoryController::class, 'getCategory'])->name('get.category');
});

//Private API
Route::group(['prefix' => 'private','middleware' => 'jwt.verify'], function () {
    Route::get('/get-product-detail/{id}', [ProductController::class, 'getProductDetail'])->name('get.product.detail');
    Route::get('/get-products-sort', [ProductController::class, 'getProductSort'])->name('get.product.sort');
    Route::get('/get-products-category', [ProductController::class, 'getByCategory'])->name('get.product.category');
});

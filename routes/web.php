<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\ServicesController;
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
## Frontend views ##
Route::get('/', function () { return view('welcome'); });
Route::get('shop', function () { return view('ProductShop'); });
Route::get('/checkout', function () { return view('checkout');})->name('checkout');
Route::get('product-details/{id}', [ProductController::class, 'show']);
Route::get('category-products/{id}', [CategoryController::class, 'show']);
Auth::routes();
## Admin Routes ##
Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Route::get('/login', [AdminAuthController::class, 'getLogin'])->name('adminLogin');
    Route::post('/login', [AdminAuthController::class, 'postLogin'])->name('adminLoginPost');
    Route::group(['middleware' => 'adminauth'], function () {
        Route::get('/logout', [AdminAuthController::class, 'adminLogout'])->name('adminLogout');
        Route::get('/',  [ServicesController::class, 'index'] )->name('adminDashboard');
        Route::get('/categories', [ServicesController::class, 'categories']);
        Route::get('/products', [ServicesController::class, 'products']);
        Route::get('/users', [ServicesController::class, 'users']);
        Route::get('/units', [ServicesController::class, 'units']);
        Route::get('/orders', [ServicesController::class, 'orders']);
        Route::get('/orders/show/{id}', [ServicesController::class, 'show']);
    });
});

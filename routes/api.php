<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\UserAuthController;
use App\Http\Controllers\Api\OrderController;

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
## Auth routes ##
Route::post('/register', [UserAuthController::class, 'register'])->name('userRegister');
Route::post('/login', [UserAuthController::class, 'login'])->name('userLogin');
## Categories routes ##
Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/categoryProducts/{id}', [CategoryController::class, 'show']);
## Products routes ##
Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/{id}', [ProductController::class, 'show']);
Route::group(['prefix' => 'user','middleware' => ['auth:user-api','scopes:user'] ],function(){ 
Route::post('/logout', [UserAuthController::class, 'logout']);
});
##checkout ##
Route::post('checkout', [OrderController::class, 'placeOrder']);

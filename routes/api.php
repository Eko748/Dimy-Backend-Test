<?php

use App\Http\Controllers\API\ProductAPI;
use App\Http\Controllers\API\AuthAPI;
use App\Http\Controllers\API\CustomerAPI;
use App\Http\Controllers\API\OrderAPI;
use App\Http\Controllers\API\PaymentMethodAPI;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::controller(AuthAPI::class)->group(function () {
    Route::post('/login', 'login');
    Route::post('/register', 'register');
});

Route::middleware('auth:sanctum')->group(function () {
});

Route::prefix("order")->group(function () {
    Route::controller(OrderAPI::class)->group(function () {
        Route::get('/get', 'get');
        Route::post('/create', 'create');
        Route::delete('/delete', 'delete');
    });
});

Route::prefix("product")->group(function () {
    Route::controller(ProductAPI::class)->group(function () {
        Route::get('/get', 'get');
    });
});

Route::prefix("payment")->group(function () {
    Route::controller(PaymentMethodAPI::class)->group(function () {
        Route::get('/get', 'get');
    });
});

Route::prefix("customer")->group(function () {
    Route::controller(CustomerAPI::class)->group(function () {
        Route::get('/get', 'get');
    });
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

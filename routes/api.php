<?php

use App\Http\Controllers\API\LoginController;
use App\Http\Controllers\API\OrderController;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\RegisterController;
use App\Http\Controllers\API\SupplierController;
use Illuminate\Support\Facades\Route;

Route::post('register', [RegisterController::class, 'register']);
Route::post('login', [LoginController::class, 'login']);

Route::middleware('auth:api')->group(function () {
    Route::resources([
        'suppliers' => SupplierController::class,
        'products' => ProductController::class,
        'orders' => OrderController::class,
    ]);
});

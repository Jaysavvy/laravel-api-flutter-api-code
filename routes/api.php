<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\TransactionController;
use App\Http\Controllers\Api\AuthController;


// ...

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::apiResource('categories', CategoryController::class);
    Route::apiResource('transactions', TransactionController::class);
});

Route::post('/auth/login', [AuthController::class, 'login']);
Route::post('/auth/register', [AuthController::class, 'register']);
Route::post('/auth/logout', [AuthController::class, 'logout'])->middleware(['auth:sanctum']);

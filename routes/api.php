<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\UserController;

Route::get('/user', function(Request $request) {
    return $request -> user();
})->middleware('auth:sanctum');

Route::prefix('foods')->group(function(){
    Route::get('/', [FoodController::class, 'index']);
    Route::get('/{id}', [FoodController::class,'getFood']);
    Route::post('/', [FoodController::class,'newFood']);
    Route::put('/{id}', [FoodController::class, 'updateFood']);
    Route::delete('/{id}', [FoodController::class, 'destroyFood']);
});

Route::prefix('users')->group(function(){
    Route::get('/', [UserController::class, 'index']);
    Route::get('/{id}', [UserController::class,'getUser']);
    Route::post('/', [UserController::class,'newUser']);
    Route::put('/{id}', [UserController::class, 'updateUser']);
    Route::delete('/{id}', [UserController::class, 'destroyUser']);
});

Route::prefix('auth')->group(function(){
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
});

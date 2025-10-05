<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\DishController;
use App\Http\Controllers\Api\FavoriteController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);


Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/dishes', [DishController::class, 'index']);         
    Route::get('/dishes/{dish}', [DishController::class, 'show']);   
    Route::middleware('permission:create dishes')->post('/dishes', [DishController::class, 'store']);    
    Route::middleware('permission:create dishes')->put('/dishes/{dish}', [DishController::class, 'update']); 
    Route::middleware('permission:delete dishes')->delete('/dishes/{dish}', [DishController::class, 'destroy']);
    Route::get('/favorites', [FavoriteController::class, 'index']);         
    Route::post('/favorites/{dish}', [FavoriteController::class, 'store']); 
    Route::delete('/favorites/{dish}', [FavoriteController::class, 'destroy']);
});

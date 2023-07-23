<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DespesaController;

Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:api')->post('/logout', [AuthController::class, 'logout']);
Route::middleware('auth:api')->put('/users/{user}', [UserController::class, 'update']);
Route::post('/register', [AuthController::class, 'register']);


Route::middleware('auth:api')->group(function () {

    Route::apiResource('users', UserController::class)->except(['store', 'destroy']);
    Route::middleware('can:delete,App\Models\User')->delete('/users/{user}', [UserController::class, 'destroy']);
    Route::post('/despesas', [DespesaController::class, 'store']);
    Route::get('/despesas/{despesa}', [DespesaController::class, 'show']);
    Route::put('/despesas/{despesa}', [DespesaController::class, 'update']);
    Route::delete('/despesas/{despesa}', [DespesaController::class, 'destroy']);
    Route::get('/despesas', [DespesaController::class, 'index']);
});

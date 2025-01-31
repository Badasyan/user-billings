<?php

use App\Http\Controllers\Balances\BalanceController;
use App\Http\Controllers\Logs\IndexLogController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Users\CreateUserController;
use L5Swagger\Http\Controllers\SwaggerController;

Route::post('/users', [CreateUserController::class, 'createUser']);
Route::get('/', [CreateUserController::class, 'index']);
Route::get('/{id}', [CreateUserController::class, 'show']);
Route::get('log/{user_id}', [IndexLogController::class, 'showLogs']);
Route::post('/change-balance/{user_id}', [BalanceController::class, 'changeBalance']);
Route::get('/api/documentation', [SwaggerController::class, 'api']);



<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Type\TypeController;
use Illuminate\Support\Facades\Route;

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
Route::post('refresh', [AuthController::class, 'refreshToken'])->middleware('auth:sanctum');
Route::get('user', [AuthController::class, 'userProfile'])->middleware('auth:sanctum');

Route::post('/types', [TypeController::class, 'all'])->middleware('auth:sanctum');
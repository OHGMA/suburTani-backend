<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

Route::post('/register', [LoginController::class, 'register'])->middleware('guest:sanctum');
Route::post('/login', [LoginController::class, 'login'])->middleware('guest:sanctum');

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/logout', function (Request $request) {
    return $request->user()->currentAccessToken()->delete();
})->middleware('auth:sanctum');



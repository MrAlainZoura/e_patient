<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\api\AuthController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
// Route::post('login', [AuthController::class, 'login']);
// Route::post('create', [AuthController::class, 'store']);
// Route::middleware('auth:api')->get('/user', [AuthController::class, 'me']);

Route::group(['middleware' => ['role:admin']], function () {
    Route::get('/admin', [AdminController::class, 'index']);
});

Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:api')->get('/me', [AuthController::class, 'me']);
Route::middleware('auth:api')->get('/auth-check', [AuthController::class, 'authCheck']);
Route::middleware('auth:api')->apiResource('patients', PatientController::class);
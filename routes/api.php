<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PassengerController;
use App\Http\Controllers\FlightController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('passengers', [PassengerController::class, 'index']);
Route::get('/flights', [FlightController::class, 'index']);
Route::get('/flights/{flight}/passengers', [FlightPassengerController::class, 'index']);

Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

Route::middleware(['auth:sanctum', 'admin'])->group(function () {
    Route::apiResource('users', UserController::class);
});
Route::get('/export/users', [UserController::class, 'export']);
Route::middleware('throttle:exports')->get('/export/users', [UserController::class, 'export']);

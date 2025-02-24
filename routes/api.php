<?php

use App\Http\Controllers\Api\V1\AuthController;
use App\Http\Controllers\Api\V1\CategoryController;
use App\Http\Controllers\Api\V1\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::prefix('v1')->middleware(['throttle:api'])->group(function () {
   Route::post('register', [AuthController::class, 'register']);
   Route::post('login', [AuthController::class, 'login']);
});


Route::prefix('v1')->middleware(['throttle:api', 'auth:sactum'])->group(function () {
   // Одна строка — это сразу группа маршрутов
   Route::apiResource('categories', CategoryController::class);
   Route::apiResource('posts', PostController::class);

   Route::get('logout', [AuthController::class, 'logout']);
});

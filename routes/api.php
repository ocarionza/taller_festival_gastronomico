<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\v1\RestaurantController;
use App\Http\Controllers\api\v1\UserController;
use App\Http\Controllers\api\v1\CommentController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/v1/login',[App\Http\Controllers\api\v1\AuthController::class,'login'])->name('api.login');

Route::middleware(['auth:sanctum'])->group(function() {
    Route::post('/v1/logout',[App\Http\Controllers\api\v1\AuthController::class,'logout'])->name('api.logout');
    Route::apiResource('v1/restaurants', RestaurantController::class);
    Route::apiResource('v1/users', UserController::class);
   });

Route::apiResource('v1/comments', CommentController::class);

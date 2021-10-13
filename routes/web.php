<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\RestaurantController::class, 'showWelcome'])->name('home.index');
Route::get('home-restaurants', [App\Http\Controllers\RestaurantController::class, 'showFrontPage'])->name('front_page.index');
Route::post('restaurants/{restaurant}/comments', [App\Http\Controllers\CommentController::class, 'storec'])->name('comments.storec');

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::resource('restaurants', App\Http\Controllers\RestaurantController::class);
    Route::resource('users', App\Http\Controllers\UserController::class);
    Route::resource('categories', App\Http\Controllers\CategoryController::class);
    Route::resource('comments', App\Http\Controllers\CommentController::class);
});

// Route::get('/restaurants', [App\Http\Controllers\RestaurantController::class, 'index'])->name('restaurants.index');
// Route::get('/restaurants/{restaurant}', [App\Http\Controllers\RestaurantController::class, 'show'])->name('restaurants.show');
// Route::get('/restaurants', [App\Http\Controllers\RestaurantController::class, 'create'])->name('restaurants.create');

<?php

use Illuminate\Support\Facades\Route;

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
Route::middleware('auth:web')->group(function() {
  Route::get('/out', [\App\Http\Controllers\LaurentController::class, 'out'])->name('laurent-out');
  Route::get('/status/{id}', [\App\Http\Controllers\LaurentController::class, 'status'])->name('laurent-status');
  Route::get('/all-status', [\App\Http\Controllers\LaurentController::class, 'allStatus'])->name('laurent-all-status');
});

Route::middleware('guest:web')->group(function() {
  Route::get('/register/{token}', [\App\Http\Controllers\AuthController::class, 'showRegisterForm'])->name('register');
  Route::post('/register-process', [\App\Http\Controllers\AuthController::class, 'register'])->name('register-process');
});

Route::get('/', [\App\Http\Controllers\HomeController::class, 'home'])->name('home');





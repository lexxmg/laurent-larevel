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

Route::get('/', [\App\Http\Controllers\HomeController::class, 'home'])->name('home');
Route::get('settings', [\App\Http\Controllers\SettingsController::class, 'index'])->name('settings');

Route::get('/out', [\App\Http\Controllers\LaurentController::class, 'out'])->name('laurent-out');
Route::get('/status/{id}', [\App\Http\Controllers\LaurentController::class, 'status'])->name('laurent-status');
Route::get('/all-status', [\App\Http\Controllers\LaurentController::class, 'allStatus'])->name('laurent-all-status');
Route::get('/add-icon', [\App\Http\Controllers\IconController::class, 'addIcon'])->name('add-icon');
Route::get('/get-out', [\App\Http\Controllers\OutController::class, 'getOutUser'])->name('get-out');
Route::get('/add-out', [\App\Http\Controllers\OutController::class, 'addOuts'])->name('add-out');

Route::get('/register/{token}', [\App\Http\Controllers\AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register-process', [\App\Http\Controllers\AuthController::class, 'register'])->name('register-process');

Route::get('/new-user-link', [\App\Http\Controllers\RegistrationLinkController::class, 'newUserLink'])->name('token.create');
Route::post('/new-user-link', [\App\Http\Controllers\RegistrationLinkController::class, 'processNewUserLink'])->name('token.create.process');
Route::get('/show-link', [\App\Http\Controllers\RegistrationLinkController::class, 'showToken'])->name('token.show');

Route::get('/login', [\App\Http\Controllers\AuthController::class, 'showloginForm'])->name('login');
Route::post('/login-process', [\App\Http\Controllers\AuthController::class, 'login'])->name('login-process');
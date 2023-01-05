<?php

use Illuminate\Support\Facades\Route;

Route::middleware('auth:admin')->group(function() {
  Route::resource('outs', \App\Http\Controllers\Admin\OutsController::class);
  Route::resource('token', \App\Http\Controllers\Admin\TokenController::class);
  Route::resource('user', \App\Http\Controllers\Admin\UserController::class);

  Route::get('home', [\App\Http\Controllers\Admin\HomeController::class, 'index'])->name('home');

  Route::get('logout', [\App\Http\Controllers\Admin\AuthController::class, 'logout'])->name('logout');

  Route::get('/new-user-link', [\App\Http\Controllers\RegistrationLinkController::class, 'newUserLink'])->name('token.create');
  Route::post('/new-user-link', [\App\Http\Controllers\RegistrationLinkController::class, 'processNewUserLink'])->name('token.create.process');
  Route::get('/show-link', [\App\Http\Controllers\RegistrationLinkController::class, 'showToken'])->name('token.show');

  Route::get('/out', [\App\Http\Controllers\LaurentController::class, 'out'])->name('laurent-out');
  Route::get('/all-status', [\App\Http\Controllers\LaurentController::class, 'allStatus'])->name('laurent-all-status');
});

Route::middleware('guest:admin')->group(function() {
  Route::get('login', [\App\Http\Controllers\Admin\AuthController::class, 'index'])->name('login');
  Route::post('login_process', [\App\Http\Controllers\Admin\AuthController::class, 'login'])->name('login_process');
});


Route::get('/add-icon', [\App\Http\Controllers\IconController::class, 'addIcon'])->name('add-icon');
Route::get('/icon', [\App\Http\Controllers\IconController::class, 'index'])->name('icon');
Route::get('/get-out', [\App\Http\Controllers\OutController::class, 'getOutUser'])->name('get-out');
Route::get('/add-out', [\App\Http\Controllers\OutController::class, 'addOuts'])->name('add-out');





Route::get('/settings', [\App\Http\Controllers\SettingsController::class, 'index'])->name('settings');
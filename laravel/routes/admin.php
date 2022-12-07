<?php

use Illuminate\Support\Facades\Route;

Route::middleware('admin')->group(function() {
  Route::resource('outs', \App\Http\Controllers\Admin\OutsController::class);
});

Route::get('login', [\App\Http\Controllers\Admin\AuthController::class, 'index'])->name('admin.login');
Route::post('login_process', [\App\Http\Controllers\Admin\AuthController::class, 'login'])->name('admin.login_process');
Route::get('logout', [\App\Http\Controllers\Admin\AuthController::class, 'logout'])->name('admin.logout');
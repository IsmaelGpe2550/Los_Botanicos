<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PlantaController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('/');
Route::get('login_form', [AuthController::class, 'login_form'])->name('login_form');

Route::post('login', [AuthController::class, 'login'])->name('login');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::resource('users', UserController::class);
Route::resource('plantas', PlantaController::class);

Route::middleware(['auth'])->group(function () {
    Route::get('profile.profile', [AuthController::class, 'login_form'])->name('profile');
    Route::get('profile.profile-edit', [AuthController::class, 'login_form'])->name('profile-edit');
});
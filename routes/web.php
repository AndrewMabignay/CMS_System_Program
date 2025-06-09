<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;

Route::get('/login', [AuthController::class, 'index'])->name('auth.login');
Route::post('/login', [AuthController::class, 'login'])->name('auth.user.login');
Route::post('/logout', [AuthController::class, 'logout'])->name('auth.user.logout');

Route::middleware(['auth', 'role:admin,author,editor'])->group(function() {
	Route::get('/users', [UserController::class, 'index'])->name('users.index');
	Route::post('/users', [UserController::class, 'store']);
	Route::put('/users/{id}', [UserController::class, 'update']);
});
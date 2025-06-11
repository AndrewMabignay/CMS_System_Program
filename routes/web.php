<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;


Route::get('/login', [AuthController::class, 'index'])->name('auth.login');
Route::post('/login', [AuthController::class, 'login'])->name('auth.user.login');
Route::post('/logout', [AuthController::class, 'logout'])->name('auth.user.logout');

Route::middleware(['auth'])->group(function() {
	Route::get('/users', [UserController::class, 'index'])->name('users.index');
	Route::post('/users', [UserController::class, 'store']);
	Route::put('/users/{id}', [UserController::class, 'update']);
	
	Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
	Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');

	Route::get('/category', [CategoryController::class, 'index'])->name('category.view');
	Route::post('/category', [CategoryController::class, 'store']);
});




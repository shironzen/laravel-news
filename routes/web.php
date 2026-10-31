<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;

// Главная страница и категории
Route::get('/', [ArticleController::class, 'index'])->name('home');
Route::get('/categories', [ArticleController::class, 'categoriesList'])->name('categories');
Route::get('/category/{id}', [ArticleController::class, 'categoryShow'])->name('category.show');

// Авторизация
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Только для Журналиста и Админа
Route::middleware(['auth', 'role:Журналист,Администратор'])->group(function () {
    Route::get('/journalist', [ArticleController::class, 'create'])->name('journalist');
    Route::post('/journalist', [ArticleController::class, 'store'])->name('journalist.store');
});

// Только для Админа
Route::middleware(['auth', 'role:Администратор'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
    Route::delete('/admin/text/{text}', [AdminController::class, 'destroy'])->name('admin.destroy');
});
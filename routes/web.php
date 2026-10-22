<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ArticleController::class, 'index'])->name('home');
Route::get('/category', function () { return view('category'); })->name('category');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () { return view('dashboard'); })->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'role:Журналист,Администратор'])->group(function () {
    Route::get('/journalist', [ArticleController::class, 'create'])->name('journalist');
    Route::post('/journalist', [ArticleController::class, 'store'])->name('journalist.store');
});

Route::middleware(['auth', 'role:Администратор'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
    Route::delete('/admin/text/{text}', [AdminController::class, 'destroy'])->name('admin.destroy');
});

require __DIR__.'/auth.php';
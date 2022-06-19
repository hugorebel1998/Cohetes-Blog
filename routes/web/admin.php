<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/home', [HomeController::class, 'index'])->name('home.admin');

// Rutas de categories
Route::get('/categories', [CategoryController::class, 'index'])->name('admin.categories.index');
Route::get('/categories/all', [CategoryController::class, 'categoryAll']);

Route::post('/categories/store', [CategoryController::class, 'store'])->name('admin.categories.store');
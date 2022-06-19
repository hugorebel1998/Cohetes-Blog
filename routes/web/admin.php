<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\Route;


Route::get('/home', [HomeController::class, 'index'])->name('home.admin');

// Rutas de categories
Route::get('/categories', [CategoryController::class, 'index'])->name('admin.categories.index');
Route::post('/categories/store', [CategoryController::class, 'store'])->name('admin.categories.store');
Route::put('/categories/update/{categoria}', [CategoryController::class, 'update'])->name('admin.categories.update');
Route::delete('/categories/delete/{categoria}', [CategoryController::class, 'delete'])->name('admin.categories.delete');



// Rutas de productos
Route::get('/products', [ProductController::class, 'index'])->name('admin.products.index');
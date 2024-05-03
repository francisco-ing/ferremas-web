<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProductController::Class, "index"])->name("Product.index");

Route::get('/login', [ProductController::Class, "indexLogin"])->name("Product.index");

Route::get('/register', [ProductController::Class, "indexRegister"])->name("Product.index");

Route::get('/carshop', [ProductController::Class, "indexCarshop"])->name("Product.index");

Route::get('/product', [ProductController::class, 'mostrarProductos'])->name('product.index');

Route::get('/contact', [ProductController::Class, "indexContact"])->name("Product.index");
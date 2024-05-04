<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProductController::Class, "index"])->name("Product.index");

Route::get('/login', [ProductController::Class, "indexLogin"])->name("Product.index");

Route::get('/register', [ProductController::Class, "indexRegister"])->name("Product.index");

Route::get('/carshop', [ProductController::Class, "indexCarshop"])->name("Product.index");

Route::get('/carshop', [ProductController::class, 'indexCarshop'])->name('shopping.cart');

Route::get('/product', [ProductController::class, 'mostrarProductos'])->name('product.index');

Route::delete('/delete-cart-product/{cod_producto}', [ProductController::class, 'deleteProductFromCart'])->name('delete.cart.product');

Route::get('/product/{cod_producto}', [ProductController::class, 'addProducttoCart'])->name('addproduct.to.cart');

Route::get('/contact', [ProductController::Class, "indexContact"])->name("Product.index");
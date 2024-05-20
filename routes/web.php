<?php

use App\Http\Controllers\TransbankController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/iniciar_compra', [TransbankController::class, 'iniciar_compra'])->name('iniciar_compra');

Route::get('/confirmar_pago', [TransbankController::class, 'confirmar_pago'])->name('confirmar_pago');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/', [ProductController::Class, "index"])->name("Product.index");

Route::get('/carshop', [ProductController::Class, "indexCarshop"])->name("Product.index");

Route::get('/transferencia', [ProductController::Class, "indexTransferencia"])->name("Product.index");

Route::get('/carshop', [ProductController::class, 'indexCarshop'])->name('shopping.cart');

Route::get('/product', [ProductController::class, 'mostrarProductos'])->name('product.index');

Route::delete('/delete-cart-product/{cod_producto}', [ProductController::class, 'deleteProductFromCart'])->name('delete.cart.product');

Route::post('/product/{cod_producto}', [ProductController::class, 'addProducttoCart'])->name('addproduct.to.cart');

Route::get('/contact', [ProductController::Class, "indexContact"])->name("Product.index");

Route::view('/admin', 'admin');

require __DIR__.'/auth.php';
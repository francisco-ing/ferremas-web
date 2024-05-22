<?php

use App\Http\Controllers\TransbankController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductApiController;
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

Route::post('/actualizar.precio', [ProductController::class, 'actualizarPrecio'])->name('actualizar.precio');

Route::get('/', [ProductController::Class, "index"])->name("Product.index");

Route::get('/carshop', [ProductController::Class, "indexCarshop"])->name("Product.index");

Route::get('/transferencia', [ProductController::Class, "indexTransferencia"])->name("Product.index");

Route::get('/ticket_compra', [ProductController::Class, "indexTicketCompra"])->name("Product.index");

Route::get('/carshop', [ProductController::class, 'indexCarshop'])->name('shopping.cart');

Route::get('/product', [ProductController::class, 'mostrarProductos'])->name('product.index');

Route::delete('/delete-cart-product/{cod_producto}', [ProductController::class, 'deleteProductFromCart'])->name('delete.cart.product');

Route::post('/product/{cod_producto}', [ProductController::class, 'addProducttoCart'])->name('addproduct.to.cart');

Route::get('/contact', [ProductController::Class, "indexContact"])->name("Product.index");

Route::get('/admin', [ClientController::class, 'index'])->name('admin');

// RUTA PARA API

Route::apiResource('producto', ProductApiController::class);

// RUTA PARA VENDEDOR
Route::get('/vendedor', function () {
    if (Auth::check()) {
        $user = Auth::user();    
        if (!empty($user->rol_usuario) && $user->rol_usuario == 'vendedor') {
            return view('vendedor');
        }
    }
    return redirect('/');
});

// RUTA PARA BODEGUERO
Route::get('/bodeguero', function () {
    if (Auth::check()) {
        $user = Auth::user();
        if (!empty($user->rol_usuario) && $user->rol_usuario == 'bodeguero') {
            return view('bodeguero');
        }
    }
    return redirect('/');
});

// RUTA PARA CONTADOR
Route::get('/contador', function () {
    if (Auth::check()) {
        $user = Auth::user();
        if (!empty($user->rol_usuario) && $user->rol_usuario == 'contador') {
            return view('contador');
        }
    }
    
    return redirect('/');
});

require __DIR__.'/auth.php';
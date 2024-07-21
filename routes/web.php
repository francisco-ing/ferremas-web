<?php

use App\Http\Controllers\TransbankController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductApiController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/transferencia', [ProductController::class, 'compra_transferencia'])->name('compra_transferencia');

Route::get('/iniciar_compra', [TransbankController::class, 'iniciar_compra'])->name('iniciar_compra');

Route::get('/confirmar_pago', [TransbankController::class, 'confirmar_pago'])->name('confirmar_pago');

Route::get('/', function () {
    return view('welcome');
});

Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/register', [AdminUserController::class, 'create'])->name('admin.register.create');
    Route::post('/admin/register', [AdminUserController::class, 'store'])->name('admin.register.store');
});

Route::middleware(['auth', 'can:isAdmin'])->group(function () {
    Route::post('/register', [RegisteredUserController::class, 'store'])->name('register');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::post('/actualizar.precio', [ProductController::class, 'actualizarPrecio'])->name('actualizar.precio');

Route::get('/', [ProductController::Class, "index"])->name("Product.index");

Route::get('/carshop', [ProductController::Class, "indexCarshop"])->name("Product.index");

Route::get('/ticket_compra', [ProductController::Class, "indexTicketCompra"])->name("Product.index");

Route::get('/carshop', [ProductController::class, 'indexCarshop'])->name('shopping.cart');

Route::get('/product', [ProductController::class, 'mostrarProductos'])->name('product.index');

Route::delete('/delete-cart-product/{cod_producto}', [ProductController::class, 'deleteProductFromCart'])->name('delete.cart.product');

Route::post('/product/{cod_producto}', [ProductController::class, 'addProducttoCart'])->name('addproduct.to.cart');

Route::get('/contact', [ProductController::Class, "indexContact"])->name("Product.index");

Route::get('/admin', [ClientController::class, 'index'])->name('admin');



// RUTA PARA API

Route::get('producto', [ProductApiController::class, 'index']);
Route::get('producto/{id}', [ProductApiController::class, 'show']);
Route::post('producto', [ProductApiController::class, 'store']);
Route::put('producto/{id}', [ProductApiController::class, 'update']);
Route::delete('producto/{id}/', [ProductApiController::class, 'destroy']);

//////////////////////////////////////////////////////////

// RUTA PARA BODEGUERO
Route::middleware(['auth'])->group(function () {
    Route::get('/bodeguero', [ProductController::class, "indexBodeguero"])->name("bodeguero.index");
});

Route::middleware(['auth'])->group(function () {
    Route::get('/vendedor', [ProductController::class, "indexVendedor"])->name("vendedor.index");
});

// RUTA PARA CONTADOR
Route::middleware(['auth'])->group(function () {
    Route::get('/contador', function () {
        $user = Auth::user();
        if (!empty($user->rol_usuario) && $user->rol_usuario == 'contador') {
            return view('contador');
        } else {
            return redirect('/');
        }
    });

    // Ruta para mostrar las compras
    Route::get('/contador', [ProductController::class, 'mostrarCompras']);
});

// Ruta para cambiar el estado de despachado
Route::post('/cambiar-despachado/{id}', [ProductController::class, 'cambiarDespachado'])->name('cambiar_despachado');

Route::post('/confirm-despacho/{id}', [ProductController::class, 'confirmDespacho'])->name('confirm-despacho');

Route::post('/cambiar-estado/{id}', [ProductController::class, 'cambiarEstado'])->name('cambiar.estado');

Route::post('/contact/send', [ContactController::class, 'send'])->name('contact.send');

Route::get('/contactSend', function () {
    return view('contactSend');
});

require __DIR__.'/auth.php';
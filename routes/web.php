<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\DetallesCarritoController;
use App\Http\Controllers\DetallesPedidoController;
use App\Http\Controllers\GuardadosController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaypalController;
use App\Http\Controllers\PedidosController;
use App\Http\Controllers\PlantaController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'landingpage'])->name('/');
Route::get('login_form', [AuthController::class, 'login_form'])->name('login_form');
Route::get('index', [HomeController::class, 'index'])->name('index');
Route::get('guardados_index', [GuardadosController::class, 'guardados_index'])->name('guardados_index');
Route::get('sin_carrito', [HomeController::class, 'sin_carrito'])->name('sin_carrito');
Route::get('pago_form', [PaypalController::class, 'pago_form'])->name('pago_form');
Route::get('/search', [HomeController::class, 'search'])->name('search');



Route::post('login', [AuthController::class, 'login'])->name('login');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');
Route::post('guardar', [GuardadosController::class, 'guardar'])->name('guardar');
Route::post('agregar_comentario', [ComentarioController::class, 'agregar_comentario'])->name('agregar_comentario');
Route::post('eliminar_comentario', [ComentarioController::class, 'eliminar_comentario'])->name('eliminar_comentario');
Route::post('validar_direccion', [PaypalController::class, 'validar_direccion'])->name('validar_direccion');



Route::resource('users', UserController::class);
Route::resource('plantas', PlantaController::class);
Route::resource('carritos', CarritoController::class);
Route::resource('detalles_carritos', DetallesCarritoController::class);
Route::resource('pedidos', PedidosController::class);
Route::resource('detalles_pedidos', DetallesPedidoController::class);


Route::middleware(['auth'])->group(function () {
    Route::get('profile.profile', [AuthController::class, 'login_form'])->name('profile');
    Route::get('profile.profile-edit', [AuthController::class, 'login_form'])->name('profile-edit');
    Route::post('guardar', [GuardadosController::class, 'guardar'])->name('guardar');
    Route::post('agregar_comentario', [ComentarioController::class, 'agregar_comentario'])->name('agregar_comentario');
    Route::get('guardados_index', [GuardadosController::class, 'guardados_index'])->name('guardados_index');
});
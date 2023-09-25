<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\ProductoController;
use App\Http\Controllers\Admin\CotizacioneController;
use App\Http\Controllers\Admin\BillController;
use App\Http\Controllers\Admin\UserController;

Route::get('', [HomeController::class, 'index'])->name('admin.home');
Route::resource('users', UserController::class)->middleware('can:admin.users.index')->only(['index', 'edit', 'update', 'destroy'])->names('admin.users');
Route::resource('productos', ProductoController::class)->middleware('can:admin.productos.index')->names('admin.productos');
Route::resource('cotizaciones', CotizacioneController::class)->names('admin.cotizaciones');
Route::resource('bills', BillController::class)->names('admin.bills');
<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\ProductoController;
use App\Http\Controllers\Admin\CotizacioneController;

Route::get('', [HomeController::class, 'index'])->name('admin.home');
Route::resource('productos', ProductoController::class)->names('admin.productos');
Route::resource('cotizaciones', CotizacioneController::class)->names('admin.cotizaciones');
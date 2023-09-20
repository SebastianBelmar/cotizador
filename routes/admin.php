<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\ProductoController;
use App\Http\Controllers\Admin\CotizacioneController;
use App\Http\Controllers\Admin\BillController;

Route::get('', [HomeController::class, 'index'])->name('admin.home');
Route::resource('productos', ProductoController::class)->names('admin.productos');
Route::resource('cotizaciones', CotizacioneController::class)->names('admin.cotizaciones');
Route::resource('bills', BillController::class)->names('admin.bills');
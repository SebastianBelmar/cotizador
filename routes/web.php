<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CotizacioneController;

Route::get('/', [CotizacioneController::class, 'index'])->name('cotizaciones.index');

Route::get('cotizaciones/{cotizacion}', [CotizacioneController::class, 'show'])->name('cotizaciones.show');

Route::get('producto/{producto}', [CotizacioneController::class, 'producto'])->name('cotizaciones.producto');




Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', function () { return view('dashboard');})->name('dashboard');});

<?php

use App\Http\Controllers\Admin\BillController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CotizacioneController;

Route::get('/', [CotizacioneController::class, 'index'])->name('cotizaciones.index');

Route::get('cotizaciones/{cotizacion}', [CotizacioneController::class, 'show'])->name('cotizaciones.show');

Route::get('producto/{producto}', [CotizacioneController::class, 'producto'])->name('cotizaciones.producto');




Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', function () { return view('dashboard');})->name('dashboard');});

    Route::post('/cotizacion-pdf/{bill}', [BillController::class, 'mostrarPdf'])->name('cotizacion.pdf');

    Route::post('/cotizacion-pdf-descargar/{bill}', [BillController::class, 'descargarPdf'])->name('cotizacion.pdf.descargar');

    Route::post('/cotizacion-pdf-guardar/{bill}', [BillController::class, 'guardarPdf'])->name('cotizacion.pdf.guardar');
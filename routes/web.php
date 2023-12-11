<?php

use App\Http\Controllers\Admin\BillController;
use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\URL;
use Illuminate\Http\Request;

use App\Http\Controllers\HomeController;
use App\Http\Livewire\Admin\Cotizaciones\Index;

Route::get('/', [HomeController::class, 'index'])->name('cotizaciones.index');
// Route::get('/', [BillController::class, 'mostrarPdf'])->name('cotizaciones.index');
Route::get('admin/bills/temporal/pdf/{bill}', [BillController::class, 'pdfTemporal'])->name('admin.bills.temporal.pdf');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {});

    Route::post('/cotizacion-pdf/{bill}', [BillController::class, 'mostrarPdf'])->name('cotizacion.pdf');

    Route::post('/cotizacion-pdf-descargar/{bill}', [BillController::class, 'descargarPdf'])->name('cotizacion.pdf.descargar');

    Route::post('/cotizacion-pdf-guardar/{bill}', [BillController::class, 'guardarPdf'])->name('cotizacion.pdf.guardar');



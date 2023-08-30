<?php

namespace App\Http\Controllers;

use App\Models\Cotizacione;
use App\Models\Producto;
use Illuminate\Http\Request;

class CotizacioneController extends Controller
{
    public function index() {
        $cotizaciones = Cotizacione::where('status', 1)->latest('id')->paginate(5);

        return view('cotizaciones.index', compact('cotizaciones'));
    }

    public function show(Cotizacione $cotizacion) {
        return view('cotizaciones.show', compact('cotizacion'));
    }

    public function producto(Producto $producto) {
        $cotizaciones = Cotizacione::where('id', $producto->id)
                                    ->where('status', 1)
                                    ->latest('id')
                                    ->paginate(3);

        return view('cotizaciones.producto', compact('cotizaciones', 'producto'));
    }
}

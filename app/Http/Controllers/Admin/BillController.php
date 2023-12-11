<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AccessPdf;
use App\Models\Cliente;
use Illuminate\Http\Request;

use App\Models\Cotizacione;
use App\Models\DatosEmpresa;
use App\Models\ItemProducto;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class BillController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.bills.destroy')->only('destroy');
        $this->middleware('can:admin.bills.index')->only('index');
        $this->middleware('can:admin.bills.index')->only('mostrarPdf');
        $this->middleware('can:admin.bills.create')->only('create');
        $this->middleware('can:admin.bills.edit')->only('edit');
    }

    public function index()
    {
        return view('admin.bills.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.bills.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Cotizacione $bill)
    {
        $datos = DatosEmpresa::get()->first();

        $items = ItemProducto::where('cotizacione_id', $bill->id)->get();

        $cliente = Cliente::where('id', $bill->cliente_id)->first();

        $detalles = $bill->detalles_termino;

        $total = 0;

        foreach ($items as $item)
        {
            $total += $item->total;
        }

        return view('admin.bills.show', compact('bill', 'items', 'total', 'datos', 'cliente', 'detalles'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cotizacione $bill)
    {
        return view('admin.bills.edit', compact('bill'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cotizacione $bill)
    {

        $bill->delete();

        return redirect()->route('admin.bills.index')->with('info', "La cotizacion ha sido eliminada");
    }

    public function mostrarPdf(Cotizacione $bill)
    {
        $items = ItemProducto::where('cotizacione_id', $bill->id)->get();

        $datos = DatosEmpresa::get()->first();

        $cliente = Cliente::where('id', $bill->cliente_id)->first();

        $detalles = $bill->detalles_termino;

        $total = 0;

        foreach ($items as $item)
        {
            $total += $item->total;
        }

        $pdf = PDF::loadView('admin.bills.cotizacion', [
            'bill' => $bill,
            'items' => $items,
            'total' => $total,
            'datos' => $datos,
            'cliente' => $cliente,
            'detalles' => $detalles,
            'ruta' => 0
        ]);

        return $pdf->stream();
    }

    public function pdfTemporal(Cotizacione $bill)
    {
        $recurso = AccessPdf::findOrFail(1);

        if ($recurso->haCaducado()) {
            return redirect()->route('unauthorized');
            return response('El recurso ha caducado.', 403);
        }

        $items = ItemProducto::where('cotizacione_id', $bill->id)->get();

        $datos = DatosEmpresa::get()->first();

        $cliente = Cliente::where('id', $bill->cliente_id)->first();

        $detalles = $bill->detalles_termino;

        $total = 0;

        foreach ($items as $item)
        {
            $total += $item->total;
        }

        $pdf = PDF::loadView('admin.bills.cotizacion', [
            'bill' => $bill,
            'items' => $items,
            'total' => $total,
            'datos' => $datos,
            'cliente' => $cliente,
            'detalles' => $detalles,
            'ruta' => 0
        ]);

        return $pdf->stream();
    }

    public function descargarPdf(Cotizacione $bill)
    {
        $items = ItemProducto::where('cotizacione_id', $bill->id)->get();

        $datos = DatosEmpresa::get()->first();

        $cliente = Cliente::where('id', $bill->cliente_id)->first();

        $detalles = $bill->detalles_termino;

        $total = 0;

        foreach ($items as $item)
        {
            $total += $item->total;
        }

        $pdf = PDF::loadView('admin.bills.cotizacion', [
            'bill' => $bill,
            'items' => $items,
            'total' => $total,
            'datos' => $datos,
            'cliente' => $cliente,
            'detalles' => $detalles,
            'ruta' => 0
        ]);

        return $pdf->download();
    }

    public function guardarPdf(Cotizacione $bill)
    {
        $items = ItemProducto::where('cotizacione_id', $bill->id)->get();

        $datos = DatosEmpresa::get()->first();

        $cliente = Cliente::where('id', $bill->cliente_id)->first();

        $detalles = $bill->detalles_termino;

        $total = 0;

        foreach ($items as $item)
        {
            $total += $item->total;
        }

        $pdf = PDF::loadView('admin.bills.cotizacion', [
            'bill' => $bill,
            'items' => $items,
            'total' => $total,
            'datos' => $datos,
            'cliente' => $cliente,
            'detalles' => $detalles,
            'ruta' => 0
        ]);

        // Obtener el contenido del PDF como una cadena
        $contenidoPDF = $pdf->output();

        // Generar un nombre único para el archivo PDF
        $name = $bill->id . '.pdf';

        // Definir la ubicación de almacenamiento
        $path = storage_path('app/pdfs/' . $name);

        // Guardar el contenido del PDF en el archivo
        file_put_contents($path, $contenidoPDF);

        // Devolver la ruta del archivo guardado
        return redirect()->route('admin.bills.index')->with('info-success', "Cotizacion Guardada");
    }


}

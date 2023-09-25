<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Cotizacione;
use App\Models\ItemProducto;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class BillController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.bills.destroy')->only('destroy');
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
        $items = ItemProducto::where('cotizacione_id', $bill->id)->get();

        $total = 0;

        foreach ($items as $item)
        {
            $total += $item->price;
        }

        return view('admin.bills.show', compact('bill', 'items', 'total'));
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

        $total = 0;

        foreach ($items as $item)
        {
            $total += $item->price;
        }

        $pdf = PDF::loadView('admin.bills.cotizacion', [
            'bill' => $bill,
            'items' => $items,
            'total' => $total
        ]);

        return $pdf->stream();
    }

    public function descargarPdf(Cotizacione $bill)
    {
        $items = ItemProducto::where('cotizacione_id', $bill->id)->get();

        $total = 0;

        foreach ($items as $item)
        {
            $total += $item->price;
        }

        $pdf = PDF::loadView('admin.bills.cotizacion', [
            'bill' => $bill,
            'items' => $items,
            'total' => $total
        ]);

        return $pdf->download();
    }

    public function guardarPdf(Cotizacione $bill)
    {
        $items = ItemProducto::where('cotizacione_id', $bill->id)->get();

        $total = 0;

        foreach ($items as $item)
        {
            $total += $item->price;
        }

        $pdf = PDF::loadView('admin.bills.cotizacion', [
            'bill' => $bill,
            'items' => $items,
            'total' => $total
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

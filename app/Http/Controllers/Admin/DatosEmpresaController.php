<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DatosEmpresa;
use Illuminate\Http\Request;

class DatosEmpresaController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.datos-empresas.index')->only('index');
        $this->middleware('can:admin.datos-empresas.create')->only('create');
        $this->middleware('can:admin.datos-empresas.edit')->only('edit');
        $this->middleware('can:admin.datos-empresas.destroy')->only('destroy');
    }

    public function index()
    {
        $datosEmpresas = DatosEmpresa::all();

        return view('admin.datosEmpresas.index', compact('datosEmpresas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.datosEmpresas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'rut' => 'required|max:255',
            'giro' => 'required|max:255',
            'address' => 'required|max:255',
            'city' => 'required|max:255',
            'email' => 'required|email|unique:datos_empresas|max:255',
            'website' => 'required|unique:datos_empresas|max:255',
            'phone' => [
                'required',
                'numeric',
                function ($attribute, $value, $fail) {
                    // Validar el formato del número de teléfono chileno
                    if (!preg_match('/^(\+?56)?(?:0?[2-9])?(9[0-9]{8}|[2-8][0-9]{7})$/', $value)) {
                        $fail('El teléfono ingresado no es un número de teléfono chileno válido. Ej: 569XXXXYYYY');
                    }
                },
            ],

            'office_hours' => 'required|max:255',
        ]);

        $datosEmpresa = DatosEmpresa::create($request->all());

        return redirect()->route('admin.datos-empresas.edit', $datosEmpresa)->with('info', 'La plantilla se creó correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DatosEmpresa $datosEmpresa)
    {
        return view('admin.datosEmpresas.edit', compact('datosEmpresa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DatosEmpresa $datosEmpresa)
    {
        $request->validate([
            'name' => 'required|max:255',
            'rut' => 'required|max:255',
            'giro' => 'required|max:255',
            'address' => 'required|max:255',
            'city' => 'required|max:255',
            'email' => "required|email|unique:datos_empresas,email,$datosEmpresa->id|max:255",
            'website' => "required|unique:datos_empresas,website,$datosEmpresa->id|max:255",
            'phone' => [
                'required',
                'numeric',
                function ($attribute, $value, $fail) {
                    // Validar el formato del número de teléfono chileno
                    if (!preg_match('/^(\+?56)?(?:0?[2-9])?(9[0-9]{8}|[2-8][0-9]{7})$/', $value)) {
                        $fail('El teléfono ingresado no es un número de teléfono chileno válido. Ej: 569XXXXYYYY');
                    }
                },
            ],
            'office_hours' => 'required|max:255',
        ]);

        $datosEmpresa->update($request->all());

        return redirect()->route('admin.datos-empresas.edit', $datosEmpresa)->with('info', 'Los datos de la empresa se actualizaron correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DatosEmpresa $datosEmpresa)
    {
        $datosEmpresa->delete();

        return redirect()->route('admin.datos-empresas.index')->with('info', 'La plantilla se eliminó con éxito');
    }
}

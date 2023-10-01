<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DatosEmpresa;
use Illuminate\Http\Request;

class DatosEmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
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
            'name' => 'required',
            'address' => 'required',
            'city' => 'required',
            'email' => 'required|email|unique:datos_empresas',
            'website' => 'required|unique:datos_empresas',
            'phone' => 'required|regex:/^[0-9]+$/',
            'office_hours' => 'required',
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
            'name' => 'required',
            'address' => 'required',
            'city' => 'required',
            'email' => "required|email|unique:datos_empresas,email,$datosEmpresa->id",
            'website' => "required|unique:datos_empresas,website,$datosEmpresa->id",
            'phone' => 'required|regex:/^[0-9]+$/',
            'office_hours' => 'required',
        ]);

        $datosEmpresa->update($request->all());

        return redirect()->route('admin.datos-empresas.edit', $datosEmpresa)->with('info', 'La plantilla se actualizó correctamente');
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

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.clientes.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'last_name' => '',
            'email' => 'email|nullable',
            'phone' => 'numeric|nullable',
            'address' => '',
            'city' => '',
        ]);

        Cliente::create($request->all());

        return redirect()->route('admin.clientes.index')->with('info', 'El cliente se creó con éxito');
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
    public function edit(Cliente $cliente)
    {
        return view('admin.clientes.edit', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cliente $cliente)
    {
        $request->validate([
            'name' => 'required',
            'last_name' => '',
            'email' => 'email|nullable',
            'phone' => 'numeric|nullable',
            'address' => '',
            'city' => '',
        ]);

        $cliente->update($request->all());

        return redirect()->route('admin.clientes.index')->with('info', 'El cliente se actualizó con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cliente $cliente)
    {
        $cliente->delete();

        return redirect()->route('admin.clientes.index')->with('info-danger', 'El producto se eliminó con éxito');
    }
}
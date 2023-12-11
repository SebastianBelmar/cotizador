<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.clientes.index')->only('index');
        $this->middleware('can:admin.clientes.create')->only('create');
        $this->middleware('can:admin.clientes.edit')->only('edit');
        $this->middleware('can:admin.clientes.destroy')->only('destroy');
    }

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
            'name' => 'required|max:255',
            'rut' => 'required|unique:clientes,rut|max:255',
            'giro' => 'nullable|max:255',
            'email' => 'email|nullable|max:255|unique:clientes,email',
            'web' => 'nullable|max:255',
            'phone' => [
                'nullable',
                'numeric',
                function ($attribute, $value, $fail) {
                    // Validar el formato del número de teléfono chileno
                    if (!preg_match('/^(\+?56)?(?:0?[2-9])?(9[0-9]{8}|[2-8][0-9]{7})$/', $value)) {
                        $fail('El teléfono ingresado no es un número de teléfono chileno válido. Ej: 569XXXXYYYY');
                    }
                },
                'unique:clientes,phone',
            ],
            'address' => 'nullable|max:255',
            'city' => 'nullable|max:255',
            'horario' => 'nullable|max:255',
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
            'name' => 'required|max:255',
            'rut' => "required|unique:clientes,rut,$cliente->id|max:255",
            'giro' => 'nullable|max:255',
            'email' => "email|nullable|unique:clientes,email,$cliente->id|max:255",
            'web' => 'nullable|max:255',
            'phone' => [
                'nullable',
                'numeric',
                function ($attribute, $value, $fail) {
                    // Validar el formato del número de teléfono chileno
                    if (!preg_match('/^(\+?56)?(?:0?[2-9])?(9[0-9]{8}|[2-8][0-9]{7})$/', $value)) {
                        $fail('El teléfono ingresado no es un número de teléfono chileno válido. Ej: 569XXXXYYYY');
                    }
                },
                "unique:clientes,phone,$cliente->id",
            ],
            'address' => 'nullable|max:255',
            'city' => 'nullable|max:255',
            'horario' => 'nullable|max:255',
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

        return redirect()->route('admin.clientes.index')->with('info-danger', 'El cliente se eliminó con éxito');
    }
}

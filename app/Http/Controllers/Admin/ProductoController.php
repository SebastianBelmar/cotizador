<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Producto;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productos = Producto::all();

        return view('admin.productos.index', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.productos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'code' => 'required|integer|unique:productos,code',
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
        ], [
            'code.required' => 'El código es obligatorio.',
            'code.integer' => 'El código debe ser un número entero.',
            'code.unique' => 'El código ya está en uso.',
            'name.required' => 'El nombre del producto es obligatorio.',
            'description.required' => 'La descripción es obligatoria.',
            'price.required' => 'El precio es obligatorio.',
            'price.numeric' => 'El precio debe ser un número.',
        ]);

        $producto = Producto::create($request->all());

        return redirect()->route('admin.productos.index', $producto)->with('info', 'El producto se creó con éxito');
    }

    public function show(Producto $producto)
    {
        return view('admin.productos.show', compact('producto'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Producto $producto)
    {
        return view('admin.productos.edit', compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Producto $producto)
    {
        $request->validate([
            'code' => "required|numeric|unique:productos,code,$producto->id",
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
        ], [
            'code.required' => 'El código es obligatorio.',
            'code.integer' => 'El código debe ser un número entero.',
            'code.unique' => 'El código ya está en uso.',
            'name.required' => 'El nombre del producto es obligatorio.',
            'description.required' => 'La descripción es obligatoria.',
            'price.required' => 'El precio es obligatorio.',
            'price.numeric' => 'El precio debe ser un número.',
        ]);

        $producto->update($request->all());

        return redirect()->route('admin.productos.index', compact('producto'))->with('info', "El producto se actualizó con éxito");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Producto $producto)
    {
        $producto->delete();

        return redirect()->route('admin.productos.index')->with('info-danger', 'El producto se eliminó con éxito');
    }
}

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
            'code' => 'required|numeric|unique:productos',
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
        ]);

        $producto = Producto::create($request->all());

        return redirect()->route('admin.productos.edit', $producto)->with('info', 'El producto se creó con éxito');
    }

    /**
     * Display the specified resource.
     */
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
        ]);

        $producto->update($request->all());

        return redirect()->route('admin.productos.edit', $producto)->with('info', 'El producto se actualizó con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Producto $producto)
    {
        $producto->delete();

        return redirect()->route('admin.productos.index')->with('info', 'El producto se eliminó con éxito');
    }
}

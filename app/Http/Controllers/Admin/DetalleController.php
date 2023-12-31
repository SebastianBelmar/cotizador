<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DetalleController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.detalles.index')->only('index');
        $this->middleware('can:admin.detalles.create')->only('create');
        $this->middleware('can:admin.detalles.edit')->only('edit');
        $this->middleware('can:admin.detalles.destroy')->only('destroy');
    }

    public function index()
    {
        return view('admin.detalles.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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
    public function destroy(string $id)
    {
        //
    }
}

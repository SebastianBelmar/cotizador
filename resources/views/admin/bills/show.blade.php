@extends('adminlte::page')

@section('title', 'Cotizador')

@section('content_header')
    <h1>Cotizacion {{$bill->id}}</h1>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
@stop

@section('content')

    @include('admin.bills.cotizacion', compact('bill', 'items'))

    <div class="py-12 px-4">
        <div class="bg-gray-600 rounded-xl p-4">
            <span class="text-white text-lg"> Acciones</span>
            <hr class="bg-white my-2">
            <div class="flex ">
                <div class="pr-4">
                    <form method="POST" action="{{ route('cotizacion.pdf', $bill) }}">
                        @csrf
                        <button class="btn btn-primary bg-cyan-700 " type="submit">Mostar PDF</button>
                    </form>
                </div>
        
                <div class="pr-4">
                    <form method="POST" action="{{ route('cotizacion.pdf.descargar', $bill) }}">
                        @csrf
                        <button class="btn btn-primary bg-cyan-700" type="submit">Descargar PDF</button>
                    </form>
                </div>
                <div class="pr-4">
                    <form method="POST" action="{{ route('cotizacion.pdf.guardar', $bill) }}">
                        @csrf
                        <button  class="btn btn-primary bg-cyan-700" type="submit">Guardar PDF</button>
                    </form>
                </div>
            </div>
        
            <br>
            @livewire('admin.bills.show-bill',  ['bill' => $bill], key($bill->id))
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
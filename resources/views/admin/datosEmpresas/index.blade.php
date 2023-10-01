@extends('adminlte::page')

@section('title', 'Cotizador')

@section('content_header')
    <a href="{{route('admin.datos-empresas.create')}}" class="btn btn-secondary btn-sm float-right">Nueva Pantilla de datos </a>
    <h1>Plantilla de datos de Empresa</h1>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
@stop

@section('content')

    @if(session('info'))
    <div class="alert alert-danger">
        {{session('info')}}
    </div>
    @endif


    @include('admin.datosEmpresas.partials.table')

@stop
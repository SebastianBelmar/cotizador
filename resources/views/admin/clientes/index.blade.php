@extends('adminlte::page')

@section('title', 'Cotizador')

@section('content_header')
    <h1>Lista de Clientes</h1>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
@stop

@section('content')
    @if (session('info'))
    <div class="alert alert-success">
        <strong>{{session('info')}}</strong>
    </div>
    @endif
    @if (session('info-danger'))
    <div class="alert alert-danger">
        <strong>{{session('info-danger')}}</strong>
    </div>
    @endif

    @livewire('admin.index-clientes')
@stop

@section('css')
@stop

@section('js')
@stop
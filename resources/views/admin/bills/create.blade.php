@extends('adminlte::page')

@section('title', 'Cotizador')

@section('content_header')
    <h1>Crear Cotizacion</h1>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
@stop

@section('content')

    @livewire('admin.bills.create-bill')

@stop

@section('css')
@stop

@section('js')
@stop
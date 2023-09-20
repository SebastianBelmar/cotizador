@extends('adminlte::page')

@section('title', 'Cotizador')

@section('content_header')
    <h1>Lista de Cotizaciones</h1>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
@stop

@section('content')
    @livewire('admin.index-bills')
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
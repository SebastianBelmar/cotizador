@extends('adminlte::page')

@section('title', 'Cotizador')

@section('content_header')
    <h1>Lista de Productos</h1>
@stop

@section('content')

    @livewire('admin.productos-index')
    
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
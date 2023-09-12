@extends('adminlte::page')

@section('title', 'Cotizador')

@section('content_header')
    <h1>Lista de Productos</h1>
@stop

@section('content')

    @livewire('admin.productos-index')
    
@stop

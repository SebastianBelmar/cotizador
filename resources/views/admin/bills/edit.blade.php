@extends('adminlte::page')

@section('title', 'Cotizador')

@section('content_header')
    <h1>Editar Cotizacion {{$bill->id}}</h1>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
@stop

@section('content')
    
    {{$bill}}
    @livewire('admin.bills.edit-bill', ['bill' => $bill], key($bill->id))
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
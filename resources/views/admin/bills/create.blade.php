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
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script> 
    function calculateResult() {
        const object = JSON.parse(this.selectedNumber);
        const selectedValue = parseInt(object.price);
        const lenght = parseInt(this.lenght);
        const width = parseInt(this.width);
        const quantity = parseInt(this.quantity);



        if (!isNaN(selectedValue) && !isNaN(lenght) && !isNaN(width) && !isNaN(quantity)) {
            this.result = selectedValue * lenght * width * quantity;
        } else {
            this.result = '';
        }

        console.log(object.code);
        this.codigo = object.code;
    }

    </script>
@stop
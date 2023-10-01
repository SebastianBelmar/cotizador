@extends('adminlte::page')

@section('title', 'Cotizador')

@section('content_header')
    <h1>Crear cliente</h1>
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
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.clientes.store']) !!}

                @include('admin.clientes.partials.form')

                {!! Form::submit('Crear cliente', ['class' => 'btn btn-primary bg-blue-600 font-bold hover:bg-blue-700 rounded-lg']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
@stop
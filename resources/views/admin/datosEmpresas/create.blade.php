@extends('adminlte::page')

@section('title', 'Cotizador')

@section('content_header')
    <h1>Crear plantilla de datos de Empresa</h1>

@stop

@section('content')

    <div class="card">
        <div class="card-body">

            {!! Form::open(['route' => 'admin.datos-empresas.store']) !!}

                @include('admin.datosEmpresas.partials.form')
                
                {!! Form::submit('Crear plantilla', ['class' => 'btn btn-primary m-4 text-bold']) !!}
            {!! Form::close()!!}
        </div>
    </div>

@stop
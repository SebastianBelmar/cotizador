@extends('adminlte::page')

@section('title', 'Cotizador')

@section('content_header')
    <h1>Editar plantilla de datos de empresa</h1>

@stop

@section('content')

    @if(session('info'))
    <div class="alert alert-success">
        {{session('info')}}
    </div>
    @endif

    <div class="card">
        <div class="card-body">

            {!! Form::model($datosEmpresa, ['route' => ['admin.datos-empresas.update', $datosEmpresa], 'method' => 'put']) !!}

                @include('admin.datosEmpresas.partials.form')
                
                {!! Form::submit('Actualizar plantilla', ['class' => 'btn btn-primary m-4 text-bold']) !!}
            {!! Form::close()!!}
        </div>
    </div>

@stop
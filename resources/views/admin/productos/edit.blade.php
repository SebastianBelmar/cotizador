@extends('adminlte::page')

@section('title', 'Cotizador')

@section('content_header')
    <h1>Editare Producto</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>

    @endif

    <div class="card">
        <div class="card-body">
            {!! Form::model($producto, ['route' => ['admin.productos.update', $producto], 'method' => 'put']) !!}

                @include('admin.productos.partials.form')

                {!! Form::submit('Actualizar producto', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@stop


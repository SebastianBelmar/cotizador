@extends('adminlte::page')

@section('title', 'Cotizador')

@section('content_header')
    <h1>Crear nuevo producto</h1>
@stop

@section('content')

    @if (session('info'))
    <div class="alert alert-success">
        <strong>{{session('info')}}</strong>
    </div>
    @endif

    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.productos.store']) !!}

                @include('admin.productos.partials.form')


                {!! Form::submit('Crear producto', ['class' => 'btn btn-primary']) !!}


            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('js')
@stop
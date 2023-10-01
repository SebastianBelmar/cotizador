@extends('adminlte::page')

@section('title', 'Cotizador')

@section('content_header')
    <h1>Editar usuario</h1>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
@stop

@section('content')
    <style>
        .btn-submit {
            background-color:#1C64F2;
            transition: background-color 0.3s; 
        }

        .btn-submit:hover {
            background-color: #1A56DB
        }
    </style>

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif

    <div class="card">
        <div class="card-body">

            <h2 class="h5 mt-4 mb-1">Datos usuario</h2>
            {!! Form::model($user, ['route' => ['admin.users.update', $user], 'method' => 'put']) !!}

                @include('admin.users.partials.form')

                {!! Form::submit('Actualizar', ['class' => 'btn btn-primary btn-submit mt-2'])!!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
@stop
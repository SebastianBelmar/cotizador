@extends('adminlte::page')

@section('title', 'Cotizador')

@section('content_header')
    <h1>Editar roles</h1>
@stop

@section('content')

    @if(session('info'))
        <div class="alert alert-success">
            {{session('info')}}
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            {!! Form::model($role, ['route' => ['admin.roles.update', $role], 'method' => 'put']) !!}
                @include('admin.roles.partials.form')
                
                @if($role->name == 'Admin')
                
                @else
                    {!! Form::submit('Actualizar Rol', ['class' => 'btn btn-primary']) !!}
                @endif
            {!! Form::close() !!}
        </div>
    </div>
    
@stop
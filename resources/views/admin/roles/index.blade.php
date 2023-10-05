@extends('adminlte::page')

@section('title', 'Cotizador')

@section('content_header')
    @can('admin.roles.create')
    <a href="{{route('admin.roles.create')}}" class="btn btn-secondary btn-sm float-right">Nuevo rol</a>
    @endcan
    <h1>Lista de roles</h1>
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles

@stop

@section('content')

    @if(session('info'))
    <div class="alert alert-danger">
        {{session('info')}}
    </div>
    @endif

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg rounded-xl border border-gray-300 bg-gray-100">        
        <table class="w-full text-sm text-left text-gray-100 dark:text-gray-100 border-none">
            <thead class="text-xs text-gray-100 uppercase bg-gray-50 dark:bg-gray-500 dark:text-gray-100 border-none">
                <tr>
                    <th scope="col" class="px-6 py-3 border-none">ID</th>
                    <th scope="col" class="px-6 py-3 border-none">Rol</th>
                    <th scope="col" class="px-6 py-3 border-none"></th>
                </tr>
            </thead>

            <tbody>
                @foreach ($roles as $role)

                    <tr>
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowra border-r-0 border-l-0">{{$role->id}}</td>
                        <td class="px-6 py-4 font-medium text-gray-900 border-r-0 border-l-0">{{$role->name}}</td>

                        <td class="px-6 py-4 border-r-0 border-l-0 w-80">
                            <div class="flex">
                                @if($role->name == 'Admin')
                                @can('admin.roles.edit')
                                    <a href="{{route('admin.roles.edit', $role)}}" class="btn btn-secondary btn-sm mr-4"><i class="fa fa-eye"></i></a>
                                    @endcan
                                @else
                                    @can('admin.roles.edit')
                                    <a href="{{route('admin.roles.edit', $role)}}" class="btn btn-primary mr-4"><i class="fa fa-edit"></i></a>
                                    @endcan
                                @endif

                                @if($role->name == 'Admin')
            
                                @else
                                @can('admin.roles.destroy')
                                <form action="{{route('admin.roles.destroy', $role)}}" method="POST">
                                    @csrf
                                    @method('delete')
    
                                    <button type="submit" class="btn btn-danger bg-red-500 btn-sm mr-4"><i class="fa fa-trash"></i></button>
                                </form>
                                @endcan
                                @endif
                            </div>
                        </td>
                    </tr>

                @endforeach
            </tbody>
        </table>
    </div>
@stop

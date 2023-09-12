@extends('adminlte::page')

@section('title', 'Cotizador')

@section('content_header')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <h1>Lista de Cotizaciones</h1>
    
    {{-- es lo mismo, pero sin usar la CDN--}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    {{-- <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script> --}}
@stop

@section('content')

    @livewire('admin.create-bill')

    @livewire('admin.show-bill',  ['title' => 'Este es un titulo de prueba'])
@stop

@section('js')



    <script> 
        Livewire.on('alert', function(message) {
            Swal.fire(
            'Good job!',
            message,
            'success'
            )
        })
    </script>

<script>

    Livewire.on('deleteCotizacion', cotizacion => {
        Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {

            Livewire.emitTo('admin.show-bill', 'delete', cotizacion);

            Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
            )
        }
    })
    })

</script>
@stop
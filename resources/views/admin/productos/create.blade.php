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


                <input type="text" id="valorInput" placeholder="Ingresa un valor">
                <button id="agregarDiv">Agregar Div</button>
                <div id="contenedorDivs">
                    <div class="miDiv">Este es un div</div>
                </div>


                {!! Form::submit('Crear producto', ['class' => 'btn btn-primary']) !!}


            {!! Form::close() !!}
        </div>
    </div>
@stop



@section('js')
 <script>
        // Obtén el botón y el contenedor de divs
    const botonAgregarDiv = document.getElementById('agregarDiv');
    const contenedorDivs = document.getElementById('contenedorDivs');
    const valorInput = document.getElementById('valorInput');

    // Agrega un evento de clic al botón
    botonAgregarDiv.addEventListener('click', function (e) {
        e.preventDefault()
        const valor = valorInput.value;
        // Crea un nuevo div y configura su contenido y clases
        const nuevoDiv = document.createElement('div');
        nuevoDiv.innerHTML = `{!! Form::checkbox('price', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el precio del producto']) !!} ${valor}`;
        nuevoDiv.classList.add('miDiv');

        // Agrega el nuevo div al contenedor
        contenedorDivs.appendChild(nuevoDiv);
    });
 </script>
@stop
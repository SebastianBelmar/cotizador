<x-app-layout>

    <div class="container py-8">
        <h1 class="text-4xl font-bold text-gray-400 pb-8">{{$cotizacion->fecha}}</h1>
        
        <div class="text-lg text-gray-300 mt-2">
            <div class="">cliente: {{$cotizacion->cliente->name}}</div>
            @foreach ($cotizacion->datos_empresa as $datosEmpresa)
                <div class="py-3">Empresa: {{$datosEmpresa->name}}</div>
            @endforeach

            @foreach ($cotizacion->item_producto as $itemProducto)
                <div class="">code: {{$itemProducto->code}}  item: {{$itemProducto->name}} </div> 
            @endforeach

            @foreach ($cotizacion->detalles_termino as $detallesTermino)
                <div class="py-3">descripcion: {{$detallesTermino->description}} </div> 
            @endforeach
            El descuento de esta cotización es: {{$cotizacion->descuento}}
        </div>
    </div>

</x-app-layout>
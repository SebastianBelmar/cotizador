@props(['cotizacion'])

<article class="mb-8 bg-white shadow-lg rounded-lg overflow-hidden">
    <h2 class="uppercase text-center text-sm font-bold text-black">
        <a href="{{route('cotizaciones.show', $cotizacion)}}">{{$cotizacion->fecha}}</a>
    </h2>

    <div class="px-6 pt-4 pb-2">
        @foreach ($cotizacion->item_producto as $itemProducto)
            <div class="">code: {{$itemProducto->code}}  item: {{$itemProducto->name}} </div> 
        @endforeach
    </div>
</article>
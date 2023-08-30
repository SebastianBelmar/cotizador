<x-app-layout>

    <div class="container py-8">
        <h1 class="uppercase text-center text-3xl font-bold text-white">Producto: {{$producto->name}}</h1>

        @foreach ($cotizaciones as $cotizacion)
            <x-card-cotizacion :cotizacion="$cotizacion" />
        @endforeach
    </div>

    <div class="mt-4">
        {{$cotizaciones->links()}}
    </div>

</x-app-layout>
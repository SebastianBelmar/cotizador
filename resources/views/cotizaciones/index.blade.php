<x-app-layout>


    <div class="container py-8 ">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($cotizaciones as $cotizacion)
                <article class="w-full h-80 bg-cover bg-center @if($loop->first) md:col-span-2 @endif bg-gray-500">
                    <div class="w-full h-full px-8 flex flex-col justify-center">

                        <h1 class="text-4xl text-white leading-8 fond-bold">
                            <a href="{{route('cotizaciones.show', $cotizacion)}}">
                                {{$cotizacion->fecha}}
                            </a>
                        </h1>
                    </div>
                </article>
            @endforeach
        </div>

        <div class="mt-4">
            {{$cotizaciones->links()}}
        </div>
    </div>

</x-app-layout>
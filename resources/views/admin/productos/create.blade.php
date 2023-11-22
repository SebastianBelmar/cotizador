<x-app-layout>

    <div class="w-full md:w-10/12 p-4 md:min-w-[480px] max-w-[1920px] h-full mx-auto bg-claro mt-8">
        @if(session('info'))
        <div class="mb-4" x-data="{open: true}">
            <button x-show="open" class="text-blanco bg-success p-4 rounded-full text-center text-xl w-full" @click="open=false;">
                <strong>{{session('info')}}</strong>
            </button>
        </div>
        @endif
        <div class="bg-blanco w-full p-6 rounded-t-3xl border-principal border-b-4 grid grid-cols-12 gap-4 px-6 lg:px-12">
            <div class="col-span-1 h-full flex items-center justify-start">
                <i class="ri-box-3-line text-principal text-4xl"></i>
            </div>
            <div class="col-span-10 flex flex-col items-center justify-center my-auto">
                <p class="text-2xl text-oscuro font-semibold">Crear Producto</p>
            </div>

        </div>

        <div class="bg-blanco w-full p-4 px-6 lg:px-12 rounded-b-3xl">
            {!! Form::open(['route' => 'admin.productos.store']) !!}

                @include('admin.productos.partials.form')

                <div class="w-full grid grid-flow-col grid-cols-2 gap-4 my-8">
                    <a class="col-span-1 w-full text-center text-blanco text-base sm:text-lg lg:text-2xl font-semibold rounded-2xl bg-danger px-2 sm:px-6 p-6 hover:ring-2 hover:ring-danger focus:ring-2 focus:ring-danger hover:bg-blanco hover:text-danger focus:text-danger focus:bg-blanco"
                    href="{{ route('admin.productos.index') }}"
                    >
                        <p>Cancelar</p>
                    </a>
                    {!! Form::submit('Crear Producto', ['class' => 'col-span-1 w-full text-center text-blanco text-base sm:text-lg lg:text-2xl font-semibold rounded-2xl bg-principal px-2 sm:px-6 p-6 hover:ring-2 hover:ring-principal focus:ring-2 focus:ring-medio hover:bg-blanco hover:text-principal focus:text-medio focus:bg-blanco cursor-pointer']) !!}
                </div>
            {!! Form::close()!!}
        </div>    

    </div>

    {{-- fondo --}}
    <div class="fixed w-full h-screen bg-claro -top-0 flex -z-50">
    </div>
    
</x-app-layout>

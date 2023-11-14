<x-app-layout>

    <div class="w-10/12 min-w-[480px] max-w-[1920px] h-full mx-auto bg-claro mt-8">
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

            <div class="bg-blanco w-full  pt-8  rounded-b-3xl  mb-6">
                {!! Form::submit('Crear Producto', ['class' => 'w-full bg-principal text-xl lg:text-2xl font-semibold border-principal border-2  rounded-xl text-blanco hover:text-principal hover:bg-blanco hover:border-2 hover:border-principal py-4 cursor-pointer']) !!}
            </div> 
            {!! Form::close()!!}
        </div>    

    </div>

    {{-- fondo --}}
    <div class="fixed w-full h-screen bg-claro -top-0 flex -z-50">
    </div>
    
</x-app-layout>

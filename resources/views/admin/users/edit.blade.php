<x-app-layout>

    <div class="w-10/12 min-w-[480px] max-w-[1920px] h-full mx-auto bg-claro my-8">
        @if(session('info'))
        <div class="mb-4" x-data="{open: true}">
            <button x-show="open" class="text-blanco bg-success p-4 rounded-full text-center text-xl w-full" @click="open=false;">
                <strong>{{session('info')}}</strong>
            </button>
        </div>
        @endif
        <div class="bg-blanco w-full p-6 rounded-t-3xl border-principal border-b-4 grid grid-cols-12 gap-4 px-6 lg:px-12">
            <div class="col-span-1 h-full flex items-center justify-start">
                <i class="ri-group-line text-principal text-4xl"></i>
            </div>
            <div class="col-span-10 flex flex-col items-center justify-center my-auto">
                <p class="text-2xl text-oscuro font-semibold">Editar Usuario</p>
            </div>

        </div>

        <div class="bg-blanco w-full p-4 px-6 lg:px-12 rounded-b-3xl">
            {!! Form::model($user, ['route' => ['admin.users.update', $user], 'method' => 'put']) !!}

                @include('admin.users.partials.form')

            <div class="bg-blanco w-full  pt-8  rounded-b-3xl  mb-6">
                {!! Form::submit('Actualizar Usuario', ['class' => 'w-full bg-principal text-xl lg:text-2xl font-semibold border-principal border-2  rounded-xl text-blanco hover:text-principal hover:bg-blanco hover:border-2 hover:border-principal py-4 cursor-pointer']) !!}
            </div> 
            {!! Form::close()!!}
        </div>    

    </div>

    {{-- fondo --}}
    <div class="fixed w-full h-screen bg-claro -top-0 flex -z-50">
    </div>
    
</x-app-layout>

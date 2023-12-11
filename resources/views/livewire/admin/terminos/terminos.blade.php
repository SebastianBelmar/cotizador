<div class="mt-4">

    @if (session('info'))
    <div x-data="{open: true}">
        <button x-show="open" class="text-blanco bg-success p-4 rounded-full text-center text-xl w-full" @click="open=false;">
            <strong>{{session('info')}}</strong>
        </button>
    </div>
    @endif


    <div  x-data="{eliminado: @entangle('eliminado').defer, creado: @entangle('creado').defer, editado: @entangle('editado').defer}" x-init="quitarAlertas()">
        <button id="eliminado" x-show="eliminado" class="text-blanco bg-danger p-4 rounded-full text-center text-xl w-full my-1 hidden"  @click="eliminado=false;">
            <strong>El término ha sido eliminado</strong>
        </button>
        <button id="creado" x-show="creado" class="text-blanco bg-success p-4 rounded-full text-center text-xl w-full my-1 hidden" @click="creado=false;">
            <strong>El término ha sido creado</strong>
        </button>

        <button id="editado" x-show="editado" class="text-blanco bg-success p-4 rounded-full text-center text-xl w-full my-1 hidden" @click="editado=false;">
            <strong>El término ha sido editado</strong>
        </button>
    </div>



    <div class="w-full flex lg:flex-row flex-col mt-8" x-data="{busqueda : @entangle('search').defer, close: false}">



        @can('admin.terminos.create')

            <div class="w-full h-20 mr-6 order-2 lg:order-1 ">
                <div class="bg-blanco h-20 rounded-2xl flex flex-row shadow-md shadow-sombra">
                    <input x-model="busqueda"
                        class="bg-claro h-18 rounded-xl border-0 m-[0.6rem] text-2xl placeholder:text-medioClaro pl-8 focus:ring-2 focus:ring-principal text-medio"
                        placeholder="buscar términos"
                        @keydown.enter="(busqueda) ? close = true : close = false"
                        wire:keydown.enter="buscar"
                        >

                    <button class="bg-danger w-16 mr-[0.6rem]  my-[0.6rem] rounded-xl flex justify-center items-center hover:bg-blanco hover:text-danger text-blanco hover:ring-2 ring-danger" x-show="close" @click="busqueda='';close = false" wire:click="buscar">
                        <i class="ri-close-line text-4xl"></i>
                    </button>

                    <button class="bg-principal w-16 mr-[0.6rem]  my-[0.6rem] rounded-xl flex justify-center items-center hover:bg-blanco hover:text-principal text-blanco hover:ring-2 ring-principal" @click="(busqueda) ? close = true : close = false" wire:click="buscar">
                        <i class="ri-search-line  text-4xl"></i>
                    </button>


                </div>
            </div>

            <div class="mb-6 lg:mb-0 h-20 order-1 lg:order-2 ">
                <button wire:click="openCrear" class="bg-principal lg:w-[360px] w-full h-20 rounded-2xl flex justify-between items-center px-12 shadow-md shadow-sombra hover:bg-blanco hover:text-principal text-blanco hover:ring-2 ring-principal">
                    <p class=" font-bold text-2xl hover:text-principal">Agregar término</p>
                    <i class="ri-add-circle-line text-4xl hover:text-principal"></i>
                </button>
            </div>

        @else

            <div class="w-full h-20 order-2 lg:order-1 ">
                <div class="bg-blanco h-20 rounded-2xl flex flex-row shadow-md shadow-sombra">
                    <input x-model="busqueda"
                        class="bg-claro h-18 rounded-xl border-0 m-[0.6rem] text-2xl placeholder:text-medioClaro pl-8 focus:ring-2 focus:ring-principal text-medio"
                        placeholder="Ingrese el nombre del término">

                    <button class="bg-danger w-16 mr-[0.6rem]  my-[0.6rem] rounded-xl flex justify-center items-center hover:bg-blanco hover:text-danger text-blanco hover:ring-2 ring-danger" x-show="close" @click="busqueda='';close = false" wire:click="buscar">
                        <i class="ri-close-line text-4xl"></i>
                    </button>

                    <button class="bg-principal w-16 mr-[0.6rem]  my-[0.6rem] rounded-xl flex justify-center items-center hover:bg-blanco hover:text-principal text-blanco hover:ring-2 ring-principal" @click="(busqueda) ? close = true : close = false" wire:click="buscar">
                        <i class="ri-search-line  text-4xl"></i>
                    </button>


                </div>
            </div>

        @endcan
    </div>

    <div class="scroll-container overflow-x-auto">
        <div class="grid grid-flow-col grid-cols-12  text-medioClaro font-semibold mt-6 bg-oscuro p-5 rounded-t-3xl w-[640px] sm:w-full">
            <div class="col-span-1 lg:pl-4">
                ID
            </div>

            <div class="col-span-8">
                TÉRMINO
            </div>

            <div class="col-span-2 lg:col-span-3">
                ACCIONES
            </div>
        </div>
        @foreach ($terminos as $termino)
        <div class="grid grid-flow-col grid-cols-12 bg-blanco text-oscuro p-5 border-claro border-b-[1px] w-[640px] sm:w-full">
            <div class="col-span-1 lg:pl-4 pr-4">
                {{$termino->id}}
            </div>
            <div class="col-span-8 pr-4">
                {{$termino->description}}
            </div>

            <div class="col-span-3 lg:col-span-3 pr-4 flex flex-row">
                @can('admin.terminos.edit')
                <button wire:click="editarTermino('{{$termino->id}}');" class="hover:text-principal transition-all duration-300 pb-1 mr-6"><i class="ri-edit-line text-xl"></i></button>
                @endcan


                @can('admin.terminos.destroy')
                <div x-data="{open : false}" class="flex">

                    <div x-show="open" class="mr-2 flex"
                    x-trap.inert.noscroll="open"
                    x-transition:enter="ease-out duration-300"
                    x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                    x-transition:leave="ease-in duration-200"
                    x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                    x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">


                            <button wire:click="borrarTermino('{{$termino->id}}');" @click="open=false" class="text-success pb-1 mr-2 flex justify-center items-center transition-all duration-300 hover:scale-105 ease-out"><i class="ri-check-line text-xl mr-2"></i><p class="hidden 2xl:flex">Eliminar</p></button>
                        <button class="text-danger pb-1 transition-all duration-300 hover:scale-125 ease-out" @click="open=false"><i class="ri-close-line text-xl"></i></button>
                    </div>

                    <button x-show="!open" class="hover:text-danger pb-1 transition-all duration-300" @click="open=!open"
                    x-trap.inert.noscroll="open"
                    x-transition:enter="ease-out duration-300"
                    x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-0"
                    x-transition:enter-end="opacity-0 translate-y-0 sm:scale-100"

                    ><i  class="ri-delete-bin-line text-xl"></i></button>
                </div>
                @endcan

            </div>

        </div>
        @endforeach

        @if($terminos->isEmpty())
        <div class="grid grid-flow-col grid-cols-12 bg-blanco text-oscuro p-5 border-claro border-b-[1px] w-[640px] sm:w-full">
            <div class="col-span-12 text-center text-xl p-8">No se encontraron resultados para tu búsqueda.</div>
        </div>
        @endif
        <div class="bg-blanco p-5 rounded-b-3xl w-[640px] sm:w-full">

        </div>
    </div>


    <div class="mt-6 mb-10" wire:ignore>
        @if($terminos->isEmpty())

        @else
            {{$terminos->links('vendor.pagination.tailwind')}}
        @endif
    </div>


    @include("livewire.admin.terminos.crear")
    @include("livewire.admin.terminos.editar")


    <script>
        function quitarAlertas() {
            var eliminado = document.getElementById('eliminado');
            var creado = document.getElementById('creado');
            var editado = document.getElementById('editado');

            eliminado.classList.remove('hidden');
            creado.classList.remove('hidden');
            editado.classList.remove('hidden');

        }
    </script>

</div>

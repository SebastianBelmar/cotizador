<div class="mt-4">

    @if (session('info'))
    <div x-data="{open: true}">
        <button x-show="open" class="text-blanco bg-success p-4 rounded-full text-center text-xl w-full" @click="open=false;">
            <strong>{{session('info')}}</strong>
        </button>
    </div>
    @endif

    @if (session('info-danger'))
    <div x-data="{open: true}">
        <button x-show="open" class="text-blanco bg-danger p-4 rounded-full text-center text-xl w-full" @click="open=false;">
            <strong>{{session('info-danger')}}</strong>
        </button>
    </div>
    @endif

    <div class="w-full flex lg:flex-row flex-col mt-8" x-data="{busqueda : @entangle('search').defer, close: false}">



        @can('admin.users.create')

            <div class="w-full h-20 mr-6 order-2 lg:order-1 ">
                <div class="bg-blanco h-20 rounded-2xl flex flex-row shadow-md shadow-sombra">
                    <input x-model="busqueda"
                        class="bg-claro h-18 rounded-xl border-0 m-[0.6rem] text-2xl placeholder:text-medioClaro pl-8 focus:ring-2 focus:ring-principal text-medio"
                        placeholder="Ingrese el nombre o email del usuario">

                    <button class="bg-danger w-16 mr-[0.6rem]  my-[0.6rem] rounded-xl flex justify-center items-center hover:bg-blanco hover:text-danger text-blanco hover:ring-2 ring-danger" x-show="close" @click="busqueda='';close = false" wire:click="buscar">
                        <i class="ri-close-line text-4xl"></i>
                    </button>

                    <button class="bg-principal w-16 mr-[0.6rem]  my-[0.6rem] rounded-xl flex justify-center items-center hover:bg-blanco hover:text-principal text-blanco hover:ring-2 ring-principal" @click="(busqueda) ? close = true : close = false" wire:click="buscar">
                        <i class="ri-search-line  text-4xl"></i>
                    </button>


                </div>
            </div>

            <div class="mb-6 lg:mb-0 h-20 order-1 lg:order-2 ">
                <a href="{{route('admin.users.create')}}" class="bg-principal lg:w-[360px] w-full h-20 rounded-2xl flex justify-between items-center px-12 shadow-md shadow-sombra hover:bg-blanco hover:text-principal text-blanco hover:ring-2 ring-principal">
                    <p class=" font-bold text-2xl hover:text-principal">Agregar Usuario</p>
                    <i class="ri-add-circle-line text-4xl hover:text-principal"></i>
                </a>
            </div>

        @else

            <div class="w-full h-20 order-2 lg:order-1 ">
                <div class="bg-blanco h-20 rounded-2xl flex flex-row shadow-md shadow-sombra">
                    <input x-model="busqueda"
                        class="bg-claro h-18 rounded-xl border-0 m-[0.6rem] text-2xl placeholder:text-medioClaro pl-8 focus:ring-2 focus:ring-principal text-medio"
                        placeholder="Ingrese el nombre del usuario">

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
        <div class="grid grid-flow-col grid-cols-12  text-medioClaro font-semibold mt-6 bg-oscuro p-5 rounded-t-3xl w-[640px] md:w-full">
            <div class="col-span-1 lg:pl-4">
                ID
            </div>
            <div class="col-span-3">
                NOMBRE
            </div>
            <div class="col-span-6 lg:col-span-6">
                EMAIL
            </div>
            <div class="col-span-2 lg:col-span-2">
                ACCIONES
            </div>
        </div>
        @foreach ($users as $user)
        <div class="grid grid-flow-col grid-cols-12 bg-blanco text-oscuro p-5 border-claro border-b-[1px] w-[640px] md:w-full">
            <div class="col-span-1 lg:pl-4 pr-4">
                {{$user->id}}
            </div>
            <div class="col-span-3 pr-4">
                {{$user->name}}
            </div>
            <div class="col-span-6 lg:col-span-6 pr-4">
                {{ $user->email}}
            </div>
            <div class="col-span-2 lg:col-span-2 pr-4 flex flex-row">
                @can('admin.users.edit')
                <a href="{{route('admin.users.edit', $user)}}" class="hover:text-principal hover:blur-[0.6px] pb-1 mr-6"><i class="ri-edit-line text-xl"></i></a>
                @endcan

                @if($user->id != 1)
                @can('admin.users.destroy')
                <form action="{{route('admin.users.destroy', $user)}}" method="POST" class="hover:blur-[0.6px]">
                    @csrf
                    @method('delete')
                    <button type=submit class="hover:text-danger pb-1"><i class="ri-delete-bin-line text-xl"></i></button>
                </form>
                @endcan
                @endif

            </div>

        </div>
        @endforeach

        @if($users->isEmpty())
        <div class="grid grid-flow-col grid-cols-12 bg-blanco text-oscuro p-5 border-claro border-b-[1px] w-[640px] md:w-full">
            <div class="col-span-12 text-center text-xl p-8">No se encontraron resultados para tu búsqueda.</div>
        </div>
        @endif
        <div class="bg-blanco p-5 rounded-b-3xl w-[640px] md:w-full">

        </div>
    </div>


    <div class="mt-6 mb-10" wire:ignore>
        @if($users->isEmpty())

        @else
            {{$users->links('vendor.pagination.tailwind')}}
        @endif
    </div> 

</div>


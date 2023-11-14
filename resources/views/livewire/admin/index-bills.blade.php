<div>
    @if (session('info'))
    <div class="alert alert-danger">
        <strong>{{session('info')}}</strong>
    </div>
    @endif

    @if (session('info-success'))
    <div class="alert alert-success">
        <strong>{{session('info-success')}}</strong>
    </div>
    @endif

    <div class="w-full flex lg:flex-row flex-col mt-10">

        @can('admin.bills.create')

        <div class="w-full h-20 mr-6 order-2 lg:order-1 ">
            <div class="bg-blanco h-20 rounded-2xl flex flex-row shadow-md shadow-sombra">
                <input wire:model="search"
                    class="bg-claro h-18 rounded-xl border-0 m-[0.6rem] text-2xl placeholder:text-medioClaro pl-8 focus:ring-2 focus:ring-principal text-medio"
                    placeholder="Ingrese el nombre del cliente">

                <button class="bg-principal w-16 mr-[0.6rem]  my-[0.6rem] rounded-xl flex justify-center items-center hover:bg-blanco hover:text-principal text-blanco hover:ring-2 ring-principal">
                    <i class="ri-search-line  text-4xl"></i>
                </button>
            </div>
        </div>

        <div class="mb-6 lg:mb-0 h-20 order-1 lg:order-2 ">
            <button wire:click="create" class="bg-principal lg:w-[360px] w-full h-20 rounded-2xl flex justify-between items-center px-12 shadow-md shadow-sombra hover:bg-blanco hover:text-principal text-blanco hover:ring-2 ring-principal">
                <p class=" font-bold text-2xl hover:text-principal">Nueva Cotización</p>
                <i class="ri-add-circle-line text-4xl hover:text-principal"></i>
            </button>
        </div>

        @else

        <div class="lg:w-full w-full h-20 mr-6 order-2 lg:order-1 ">
            <div class="bg-blanco w-full h-20 rounded-2xl flex flex-row shadow-md shadow-sombra">
                <input wire:model="search"
                    class="bg-claro w-full h-18 rounded-xl border-0 m-[0.6rem] text-2xl placeholder:text-medioClaro pl-8 focus:ring-2 focus:ring-principal text-medio"
                    placeholder="Ingrese el nombre del cliente">

                    <button class="bg-principal w-16 mr-[0.6rem]  my-[0.6rem] rounded-xl flex justify-center items-center hover:bg-blanco hover:text-principal text-blanco hover:ring-2 ring-principal">
                        <i class="ri-search-line text-4xl"></i>
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
            <div class="col-span-2">
                FECHA
            </div>
            <div class="col-span-3 lg:col-span-4">
                CLIENTE
            </div>
            <div class="col-span-3">
                USUARIO
            </div>
            <div class="col-span-3 lg:col-span-2">
                ACCIONES
            </div>
        </div>
        @foreach ($cotizaciones as $cotizacion)
        <div class="grid grid-flow-col grid-cols-12 bg-blanco text-oscuro p-5 border-claro border-b-[1px] w-[640px] md:w-full">
            <div class="col-span-1 lg:pl-4 pr-4">
                {{$cotizacion->id}}
            </div>
            <div class="col-span-2 pr-4">
                {{$cotizacion->fecha}}
            </div>
            <div class="col-span-3 lg:col-span-4 pr-4">
                {{ $cotizacion->cliente_id ? $clientes[intval($cotizacion->cliente_id)] : ""}}
            </div>
            <div class="col-span-3 pr-4">
                {{$cotizacion->user_id ? $usuarios[intval($cotizacion->user_id)] : ""}}
            </div>
            <div class="col-span-3 lg:col-span-2 pr-4 flex flex-row">
                <a href="{{route('admin.bills.show', $cotizacion)}}" class=" hover:text-principal opacity-100 ri-eye-line text-xl hover:blur-[0.6px] mr-6"></a>
                @can('admin.bills.edit')
                <a href="{{route('admin.bills.edit', $cotizacion)}}" class="hover:text-principal hover:blur-[0.6px] pb-1 mr-6"><i class="ri-edit-line text-xl"></i></a>
                @endcan

                @can('admin.bills.destroy')
                <form action="{{route('admin.bills.destroy', $cotizacion)}}" method="POST" class="hover:blur-[0.6px]">
                    @csrf
                    @method('delete')
                    <button type=submit class="hover:text-danger pb-1"><i class="ri-delete-bin-line text-xl"></i></button>
                </form>
                @endcan
            </div>
        </div>
        @endforeach
        <div class="bg-blanco p-5 rounded-b-3xl w-[640px] md:w-full">

        </div>
    </div>

     <div class="mt-6 mb-10">
        {{$cotizaciones->links('simple-tailwind')}}
    </div> 
     <div class="mt-6 mb-10">
        {{$cotizaciones->links('vendor.pagination.tailwind')}}
    </div> 
    <div class="mt-6 mb-10">
        {{$cotizaciones->links()}}
    </div>
</div>

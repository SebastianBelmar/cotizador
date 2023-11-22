    <x-app-layout>

        {{-- PAGINA --}}
        <div class="w-full md:w-10/12 p-4 md:min-w-[640px] max-w-[920px] h-full mx-auto bg-claro mt-2">
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
            
                <div class="w-full flex lg:flex-row flex-col mt-8" >
            
            
            
                    @can('admin.roles.create')
            
            
                        <div class="mb-6 w-full h-20 order-1 ">
                            <a href="{{route('admin.roles.create')}}" class="bg-principal w-full h-20 rounded-2xl flex justify-between items-center px-6 sm:px-12 shadow-md shadow-sombra hover:bg-blanco hover:text-principal text-blanco hover:ring-2 ring-principal">
                                <p class="w-full  font-bold text-2xl hover:text-principal text-center">Agregar Nuevo Rol</p>
                                <i class="ri-add-circle-line text-4xl hover:text-principal"></i>
                            </a>
                        </div>
            
                    @endcan
                </div>
            
                <div class="scroll-container overflow-x-auto">
                    <div class="grid grid-flow-col grid-cols-12  text-medioClaro font-semibold mt-6 bg-oscuro p-5 rounded-t-3xl w-full sm:w-full">
                        <div class="col-span-2 lg:pl-4">
                            ID
                        </div>
                        <div class="col-span-6">
                            NOMBRE
                        </div>
                        <div class="col-span-4 lg:col-span-4">
                            ACCIONES
                        </div>
                    </div>
                    @foreach ($roles as $role)
                    <div class="grid grid-flow-col grid-cols-12 bg-blanco text-oscuro p-5 border-claro border-b-[1px] w-full sm:w-full">
                        <div class="col-span-2 lg:pl-4 pr-4">
                            {{$role->id}}
                        </div>
                        <div class="col-span-6 pr-4">
                            {{$role->name}}
                        </div>
                        <div class="col-span-4 lg:col-span-4 pr-4 flex flex-row">
                            @can('admin.roles.edit')
                            <a href="{{route('admin.roles.edit', $role)}}" class="hover:text-principal hover:blur-[0.6px] pb-1 mr-6"><i class="ri-edit-line text-xl"></i></a>
                            @endcan
                            @if($role->id != 1)
                            @can('admin.roles.destroy')
                            <form action="{{route('admin.roles.destroy', $role)}}" method="POST" class="hover:blur-[0.6px]">
                                @csrf
                                @method('delete')
                                <button type=submit class="hover:text-danger pb-1"><i class="ri-delete-bin-line text-xl"></i></button>
                            </form>
                            @endcan
                            @endif
                        </div>
            
                    </div>
                    @endforeach
            
                    @if($roles->isEmpty())
                    <div class="grid grid-flow-col grid-cols-12 bg-blanco text-oscuro p-5 border-claro border-b-[1px] w-full sm:w-full">
                        <div class="col-span-12 text-center text-xl p-8">No hay roles creados</div>
                    </div>
                    @endif
                    <div class="bg-blanco p-5 rounded-b-3xl w-full sm:w-full">
            
                    </div>
                </div>
            
            </div>
        </div>
    
        <div class="fixed w-full h-screen bg-claro -top-0 flex -z-50">
        </div>



        {{--FIN PAGINA --}}

        {{-- FONDO --}}
        <div class="fixed w-full h-screen bg-claro -top-0 flex -z-50">
        </div>
    
    </x-app-layout>
    
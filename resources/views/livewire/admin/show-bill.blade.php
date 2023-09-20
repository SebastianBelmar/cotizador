<div wire:init="loadCotizaciones">
    {{-- wire:init="loadCotizaciones se ejecuta cuando la carga de la pagina esta completada --}}
    <h1>Cotizaciones</h1>
    <div class="card">
        <div class="px-4 py-3 bg-dark">
            <span class="font-weight-bold">Busqueda:</span>
            <div class="d-flex align-items-center justify-content-center">            
                <x-input type="text" class="form-control w-100 mr-4" placeholder="Escriba el nombre cliente para buscar" wire:model="search" />
            </div>
        </div>
        <div class="card-body bg-gray">

            {{-- para una coleccion $cotizaciones->count() --}}
            @if(count($cotizaciones))
                <table class="table table-striped">
                    <thead class="bg-gray-500">
                        <tr>
                            <th scope="col" class="w-20 px-8 py-4 text-left text-sm font-medium text-gray-100 uppercase pointer" style="cursor: pointer;" wire:click="order('id')">
                                @if($sort == 'id')

                                    @if ($direction == 'asc')
                                        <i class="fas fa-sort-alpha-up-alt mr-1"></i>
                                    @else
                                        <i class="fas fa-sort-alpha-down-alt mr-1"></i>
                                    @endif
                                    
                                @else   
                                    <i class="fas fa-sort mr-1"></i>
                                @endif
                                ID
                            </th>
                            <th scope="col" class="w-20 px-8 py-4 text-left text-sm font-medium text-gray-100 uppercase pointer" style="cursor: pointer;" wire:click="order('fecha')">

                                @if($sort == 'fecha')

                                    @if ($direction == 'asc')
                                        <i class="fas fa-sort-alpha-up-alt mr-1"></i>
                                    @else
                                        <i class="fas fa-sort-alpha-down-alt mr-1"></i>
                                    @endif
                                    
                                @else   
                                    <i class="fas fa-sort mr-1"></i>
                                @endif

                                Fecha
                            </th>
                            <th scope="col" class="w-20 px-8 py-4 text-left text-sm font-medium text-gray-100 uppercase pointer" style="cursor: pointer;" wire:click="order('cliente_id')">
                                
                                @if($sort == 'cliente_id')

                                    @if ($direction == 'asc')
                                        <i class="fas fa-sort-alpha-up-alt mr-1"></i>
                                    @else
                                        <i class="fas fa-sort-alpha-down-alt mr-1"></i>
                                    @endif
                                    
                                @else   
                                    <i class="fas fa-sort mr-1"></i>
                                @endif
                                                        
                                Cliente
                            </th>
                            <th scope="col" class="w-20 px-8 py-4 text-left text-sm font-medium text-gray-100 uppercase pointer" style="cursor: pointer;" wire:click="order('user_id')">
                                @if($sort == 'user_id')

                                    @if ($direction == 'asc')
                                        <i class="fas fa-sort-alpha-up-alt mr-1"></i>
                                    @else
                                        <i class="fas fa-sort-alpha-down-alt mr-1"></i>
                                    @endif
                                    
                                @else   
                                    <i class="fas fa-sort mr-1"></i>
                                @endif
                                Usuario
                            </th>
                            <th scope="col" class="w-20 px-8 py-4">
                                Editar
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($cotizaciones as $cotizacion)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ $cotizacion->id }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ $cotizacion->fecha }}</div>
                                </td>


                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ $cotizacion->cliente_id}}</div>
                                </td> 
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ $cotizacion->user_id }}</div>
                                </td>

                                <td width=10px class="d-flex justify-content-between">
                                    {{-- con anidamiento --}}
                                    @livewire('admin.edit-bill', ['cotizacion' => $cotizacion], key($cotizacion->id))
                                    {{-- sin anidamiento --}}
                                    <a class="btn btn-secondary btn-sm mr-4" wire:click="edit({{$cotizacion}})">
                                        <i class="fa fa-edit"></i>    
                                    </a>
                                    <a class="btn btn-danger btn-sm mr-4" wire:click="$emit('deleteCotizacion', {{$cotizacion}})">
                                        <i class="fa fa-trash"></i>    
                                    </a>
                                </td>           
                                                        

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            

            @if ($cotizaciones->hasPages())
                <div class="px-6 py-3">
                    {{$cotizaciones->links()}}
                </div>
            @endif

            @endif

                @if($readyToLoad)
                    <div class="px-4 py-3 d-flex justify-content-center align-items-center" style="height: 100px;">
                        <span class="text-center w-100"><strong>No hay resultados</strong></span>
                    </div>
                @else
                    <div class=" flex items-center justify-center w-full h-48">
                        <div class="w-16 h-16 border-t-4 border-blue-500 border-solid rounded-full animate-spin"></div>
                    </div>
                @endif
            
            

            {{-- se muestra si tiene 2 paginas minimo --}}

        </div>
    </div>

    <x-dialog-modal wire:model="open_edit" >

        <x-slot name='title'>
            <p class="text-black"> la Cotizacion {{$fecha_edit}} </p>
        </x-slot>

        <x-slot name='content' class="">
            <div class="bg-gray-700 p-2 rounded-xl">
                <div class="mb-4">
                    <x-label value="Fecha"/>
                    <x-input type="date" wire:model.defer="cotizacion.fecha" class="w-full bg-white"/>
                    <x-input-error for="cotizacion.fecha"/>
                </div>

                <div class="mb-4">
                    <x-label value="Descuento"/>
                    <x-input type="number" placeholder="valor descuento" wire:model.defer="cotizacion.descuento" class="w-full bg-white" />    
    
                    <x-input-error for="cotizacion.descuento"/>
                </div>

                <div class="mb-4">
                    <x-label  value="Estado"/>
                    <x-input type="radio" name="opcion" value="1" class="bg-gray border-black" wire:model.defer="cotizacion.status"/><span class="text-gray-100">publicar</span>
                    <x-input type="radio" name="opcion" value="2" class="bg-gray  border-black ml-4" wire:model.defer="cotizacion.status"/> <span class="text-gray-100">no publicar</span>
    
                    <x-input-error for="cotizacion.status"/>
                </div>
            </div>


        </x-slot>

        <x-slot name='footer'>

            <div class="flex justify-between w-full">
                <div class="">
                    <x-danger-button wire:click="$set('open_edit', false)" >Cerrar</x-danger-button>
                </div>

                <div class="flex justify-between">

                    <span class="
                    spinner 
                    border-4 
                    border-solid  
                    w-8 
                    h-8 
                    rounded-full 
                    border-t-4 
                    border-blue-500 
                    border-l-transparent 
                    animate-spin mr-4"
                    
                    wire:loading
                    wire:target="save"
                    >
                    </span>
                
                    <x-secondary-button wire:click="update" wire:loading.attr="disabled" wire:loading.class="bg-blue-100" wire:target="save" class="disabled:opacity-25">Guardar</x-secondary-button>
                </div>
            </div>

        </x-slot>

    </x-dialog-modal>
</div>

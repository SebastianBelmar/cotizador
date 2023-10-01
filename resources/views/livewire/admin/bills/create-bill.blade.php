<div>
    <div x-data="{ step: @entangle('step') }">    

        <div x-show="step === 1" class="card rounded-[20px]">
            <div class="card-body bg-slate-700 rounded-[20px]">

                <div class="mb-4">
                    <x-label value="Fecha"/>
                    <x-input type="date" wire:model="fecha" class="w-full bg-white" />

                    <x-input-error for="fecha"/>
                </div>
                
                <div class="mb-4 ">
                    <x-label value="Clientes"/>
                    <select wire:model="cliente_id" class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">

                        <option value="null" selected>--Seleccione un Cliente--</option>
                        @foreach ($clientes as $cliente)
                            <option value="{{$cliente->id}}"><strong>ID</strong>: {{$cliente->id}} -- <strong>NOMBRE</strong>: {{$cliente->name}}</option>
                        @endforeach 
                    </select>
                    <x-input-error for="cliente_id"/>
                </div>

                <div class="mb-4 ">
                    <x-label value="Descuento"/>
                    <x-input type="number" wire:model="descuento" placeholder="valor descuento" class="w-full bg-white text-left" />    
                    <x-input-error for="descuento"/>
                </div>

                <div class="mb-4">
                    <x-label  value="Estado"/>
                    <x-input class="form-radio text-indigo-600" type="radio" name="opcion" value="1"  wire:model.defer="status"/> <span class="text-gray-200">publicar</span> 
                    <x-input class="form-radio text-indigo-600 ml-4" type="radio" name="opcion" value="2" wire:model.defer="status"/> <span class="text-gray-200">no publicar</span>

                    <x-input-error for="status"/>
                </div>

                <hr class="bg-white mb-4 w-full">

                <div class="flex justify-between w-full">
                    <div class="flex justify-between">

                        <span class="spinner border-4 border-solid w-8 h-8 rounded-full border-t-4 border-blue-500 border-l-transparent animate-spin mr-4" wire:loading wire:target="save"></span>
                    
                        <x-secondary-button wire:click="create" wire:loading.attr="disabled" wire:loading.class="bg-blue-100" wire:target="save" class="disabled:opacity-25">Guardar</x-secondary-button>
                    </div>
                </div>

            </div>
        </div>

        <div  x-show="step === 2"class="card rounded-[20px]">
            <div class="card-body bg-slate-700 rounded-[20px]">

                {{-- DATOS --}}
                <h2 class="text-gray-200 my-3 text-xl">Datos empresa</h2>
                <x-danger-button wire:click="$set('openDatos', true)">
                    Seleccionar Datos
                </x-danger-button>

                <x-dialog-modal wire:model="openDatos" class="text-black bg-black"> 
                    <x-slot name="title" >
                        <span class="text-black">Datos Empresa</span>
                    </x-slot>
            
                    <x-slot name="content" >
                        <div class="bg-gray-500 rounded-xl p-4">
                            <div class="mb-4 ">
                                <x-label value="Plantillas"/>
                                <select wire:init="inicializarValores" wire:model="datosEmpresa_id" class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                                    <option value="nulo">-- <strong>SELECCIONE PLANTILLA</strong> --</option>                   
                                    @foreach ($datosEmpresas as $datosEmpresa)
                                            <option value="{{$datosEmpresa['id']}}"><strong>ID</strong>: {{$datosEmpresa['id']}} -- <strong>NOMBRE</strong>: {{$datosEmpresa['name']}} --</option>
                                    @endforeach
                                </select>
                            </div>                
                        </div>
                    </x-slot >
            
                    <x-slot name="footer" >
                        <div class="flex justify-between w-full">
                            <div class="">
                                <x-danger-button wire:click="$set('openDatos', false)" >Cerrar</x-danger-button>
                            </div>
            
                            <div class="flex justify-between">
            
                                <span class="spinner border-4 border-solid w-8 h-8 rounded-full border-t-4 border-blue-500 border-l-transparent animate-spin mr-4" wire:loading wire:target="datosEmpresa"></span>
                            
                                <x-secondary-button wire:click="datosEmpresa" wire:loading.attr="disabled" wire:loading.class="bg-blue-100" wire:target="datosEmpresa" class="disabled:opacity-25">Guardar</x-secondary-button>
                            </div>
                        </div>
                    </x-slot>
                </x-dialog-modal>

                {{-- Mostrar Datos --}}
                <div class="text-white text-lg">
                    <hr class="bg-white my-3">
                    nombre: {{(isset($datosEmpresa_id) && is_numeric($datosEmpresa_id)) ? $datosEmpresas[$datosEmpresa_id-1]['name'] : ''}} <br>
                    dirección: {{(isset($datosEmpresa_id) && is_numeric($datosEmpresa_id)) ? $datosEmpresas[$datosEmpresa_id-1]['address'] : ''}} <br>
                    ciudad: {{(isset($datosEmpresa_id) && is_numeric($datosEmpresa_id)) ? $datosEmpresas[$datosEmpresa_id-1]['city'] : ''}} <br>
                    sitio web: {{(isset($datosEmpresa_id) && is_numeric($datosEmpresa_id)) ? $datosEmpresas[$datosEmpresa_id-1]['website'] : ''}} <br>
                    teléfono: {{(isset($datosEmpresa_id) && is_numeric($datosEmpresa_id)) ? $datosEmpresas[$datosEmpresa_id-1]['phone'] : ''}} <br>
                    horario: {{(isset($datosEmpresa_id) && is_numeric($datosEmpresa_id)) ? $datosEmpresas[$datosEmpresa_id-1]['email'] : ''}} <br>
                    horario: {{(isset($datosEmpresa_id) && is_numeric($datosEmpresa_id)) ? $datosEmpresas[$datosEmpresa_id-1]['office_hours'] : ''}} <br>
                    <hr class="bg-white mt-3">
                </div>
                {{-- DATOS FIN --}}

                {{-- ITEMS --}}
                <h2 class="text-gray-200 my-3 text-xl">Lista de Items</h2>
                {{-- boton modal crear--}}
                <x-danger-button wire:click="$set('open', true)">
                    Agregar Item
                </x-danger-button>
    
                {{-- ventana modal CREAR -- con Livewire --}}
                <x-dialog-modal wire:model="open" class="text-black bg-black"> 
                    <x-slot name="title" >
                        <span class="text-black"> Item</span>
                    </x-slot>
            
                    <x-slot name="content" >
            
                        <div class="bg-gray-500 rounded-xl p-4">
            
                            <div class="mb-4 ">
            
                                <x-label value="Productos"/>
                                <select wire:init="inicializarValores" wire:model="code" wire:change="calcular()" class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                                    <option value="">-- <strong>SELECCIONE UN PRODUCTO</strong> --</option>                   
                                    @foreach ($productos as $producto)
                                            <option value="{{$producto->code}}"><strong>ID</strong>: {{$producto->id}} -- <strong>NOMBRE</strong>: {{$producto->name}} -- <strong>PRECIO</strong>: {{$producto->price}}</option>
                                    @endforeach 
            
                                </select>
                            </div>
            
                            <div class="mb-4">
                                <x-label value="Codigo"/>
                                {{$code}}
            
                                <x-input-error for="code"/>
                            </div>
                            
                            <div class="mb-4">
                                <x-label value="Descripcion"/>
                                <x-input type="text" wire:model="name" placeholder="Descripcion" class="w-full text-left" />    
            
                                <x-input-error for="name"/>
                            </div>
            
                            <div class="mb-4">
                                <x-label value="Largo [metros]"/>
                                <x-input type="number" wire:model="lenght" placeholder="Largo" class="w-full text-left" placeholder="Ingresa un número" wire:change="calcular()" />    
                
                                <x-input-error for="lenght"/>
                            </div>
            
                            <div class="mb-4">
                                <x-label value="Ancho [metros]"/>
                                <x-input type="number" placeholder="Ancho" wire:model="width" class="w-full text-left" wire:change="calcular()" />
                                
                                <x-input-error for="width"/>
                            </div>
            
                            <div class="mb-4">
                                <x-label value="Cantidad"/>
                                <x-input type="number" wire:model="quantity" wire:change="calcular()" placeholder="Cantidad" class="w-full text-left" />
            
                                <x-input-error for="quantity"/>
                            </div>
            
                            <div class="mb-4">
            
                                <x-label value="Precio"/>
            
                                <span class="text-gray-200 text-xl text-bold" wire:init="inicializarValores">{{ $price }}</span>
                                
                            </div>
                
                        </div>
                    </x-slot >
            
                    <x-slot name="footer" >
            
                        <div class="flex justify-between w-full">
                            <div class="">
                                <x-danger-button wire:click="$set('open', false)" >Cerrar</x-danger-button>
                            </div>
            
                            <div class="flex justify-between">
            
                                <span class="spinner border-4 border-solid w-8 h-8 rounded-full border-t-4 border-blue-500 border-l-transparent animate-spin mr-4" wire:loading wire:target="createItem"></span>
                            
                                <x-secondary-button wire:click="createItem" wire:loading.attr="disabled" wire:loading.class="bg-blue-100" wire:target="createItem" class="disabled:opacity-25">Guardar</x-secondary-button>
                            </div>
                        </div>
            
                    </x-slot>
            
                </x-dialog-modal>
    
                {{-- ventana modal editar--}}
                <x-dialog-modal wire:model="open_edit" class="text-black bg-black"> 
                    <x-slot name="title" >
                        <span class="text-black"> Item</span>
                    </x-slot>
            
                    <x-slot name="content" >
    
                        <div class="bg-gray-500 rounded-xl p-4">
    
                            <div class="mb-4 ">
    
                                <x-label value="Productos"/>
                                <select wire:model="item.code" class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">                               
                                    @foreach ($productos as $producto)
                                            <option value="{{$producto->code}}"><strong>ID</strong>: {{$producto->id}} -- <strong>NOMBRE</strong>: {{$producto->name}} -- <strong>PRECIO</strong>: {{$producto->price}}</option>
                                    @endforeach 
    
                                </select>
                            </div>
    
                            <div class="mb-4">
                                <x-label value="Codigo"/>
                            </div>
                            
                            <div class="mb-4">
                                <x-label value="Descripcion"/>
                                <x-input type="text" wire:model="item.name" placeholder="Descripcion" class="w-full" />    
    
                            </div>
    
                            <div class="mb-4">
                                <x-label value="Largo [metros]"/>
                                <x-input type="number" wire:model="item.lenght" placeholder="Largo" class="w-full" placeholder="Ingresa un número" />    
                
    
                            </div>
    
                            <div class="mb-4">
                                <x-label value="Ancho [metros]"/>
                                <x-input type="number" placeholder="Ancho" wire:model="item.width" class="w-full"  />    
                            </div>
    
                            <div class="mb-4">
                                <x-label value="Cantidad"/>
                                <x-input type="number" wire:model="item.quantity" placeholder="Cantidad" class="w-full" />
                            </div>
    
                            <div class="mb-4">
        
                                <x-label value="Precio"/>
    
                            </div>
                
                        </div>
                    </x-slot >
            
                    <x-slot name="footer" >
            
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
                
                <div class="m-3"></div>
    
                {{-- lista item  --}}
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg rounded-xl border border-gray-300 bg-gray-100">
                    <table class="w-full text-sm text-left text-gray-100 dark:text-gray-100 border-none">
                        <thead class="text-xs text-gray-100 uppercase bg-gray-50 dark:bg-gray-500 dark:text-gray-100 border-none">
                            <tr>
                                <th scope="col" class="px-6 py-3 border-none">
                                    Codigo
                                </th>
                                <th scope="col" class="px-6 py-3 border-none">
                                    Descripcion
                                </th>
                                <th scope="col" class="px-6 py-3 border-none">
                                    Cantidad
                                </th>
                                <th scope="col" class="px-6 py-3 border-none">
                                    Precio
                                </th>
                                <th scope="col" class="px-6 py-3 border-none">
                                    Acciones
                                </th>
                            </tr>
                        </thead>
                        <tbody >
                            @if($items->count())
                                @foreach ($items as $item)
                                    <tr class="bg-white border-b dark:bg-gray-100 dark:border-gray-100">
                                        <th class="px-6 py-4 font-medium text-gray-900 whitespace-nowra border-r-0 border-l-0">
                                            {{ $item->code }}
                                        </th>
                                        <td class="px-6 py-4 border-r-0 border-l-0">
                                            {{ $item->name }}
                                        </td>
                                        <td class="px-6 py-4 border-r-0 border-l-0">
                                            {{ $item->quantity}}
                                        </td>
                                        <td class="px-6 py-4 border-r-0 border-l-0">
                                            {{ $item->price}}
                                        </td>
                                        <td class="px-6 py-4 border-r-0 border-l-0">
    
                                            <div class="flex">
                                                @livewire('admin.bills.edit-item', ['item' => $item], key('item'.$item->id))
    
                                                <a class="btn btn-danger btn-sm mr-4" wire:click="delete({{$item}})">
                                                    <i class="fa fa-trash"></i>    
                                                </a>
                                            </div>
    
                                        </td>
    
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
                {{-- ITEMS FIN --}}

                <hr class="bg-white mt-3">

                {{-- DETALLES --}}
                <h2 class="text-gray-200 my-3 text-xl">Detalles y Terminos</h2>
                <div class="w-full bg-gray-800 p-4 rounded-xl">
                    <h2 class="text-gray-200 mb-3 text-lg">Agregar nuevos Detalles o Terminos</h2>
                    <x-danger-button wire:click="$set('openDetalles', true)">
                        Agregar Nuevo
                    </x-danger-button>
                </div>


                {{-- Modal crear detalle o termino --}}
                <x-dialog-modal wire:model="openDetalles" class="text-black bg-black"> 
                    <x-slot name="title" >
                        <span class="text-black">Detalles o Terminos</span>
                    </x-slot>
            
                    <x-slot name="content" >
                        <div class="bg-gray-500 rounded-xl p-4">
                            <div class="mb-4 ">
                                <x-label value="descripción"/>
                                <textarea wire:model="DTDescription" class="w-full rounded-xl text-gray-700"></textarea>
                                <x-input-error for="DTDescription"/>
                            </div>

                            <div class="mb-4">
                                <x-label  value="Detalle o Termino"/>
                                <x-input class="form-radio text-indigo-600" type="radio" name="opcion" value="1"  wire:model.defer="DTStatus"/> <span class="text-gray-200">Detalle</span> 
                                <x-input class="form-radio text-indigo-600 ml-4" type="radio" name="opcion" value="2" wire:model.defer="DTStatus"/> <span class="text-gray-200">Termino</span>
            
                                <x-input-error for="DTStatus"/>
                            </div>
                        </div>

                    </x-slot >
            
                    <x-slot name="footer" >
                        <div class="flex justify-between w-full">
                            <div class="">
                                <x-danger-button wire:click="$set('openDetalles', false)" >Cerrar</x-danger-button>
                            </div>
            
                            <div class="flex justify-between">
            
                                <span class="spinner border-4 border-solid w-8 h-8 rounded-full border-t-4 border-blue-500 border-l-transparent animate-spin mr-4" wire:loading wire:target="detallesTerminos"></span>
                            
                                <x-secondary-button wire:click="detallesTerminos" wire:loading.attr="disabled" wire:loading.class="bg-blue-100" wire:target="detallesTerminos" class="disabled:opacity-25">Guardar</x-secondary-button>
                            </div>
                        </div>
                    </x-slot>
                </x-dialog-modal>

                {{-- Modal editar detalle o termino --}}
                <x-dialog-modal wire:model="openDetalles_edit" class="text-black bg-black"> 
                    <x-slot name="title" >
                        <span class="text-black">Detalles o Terminos</span>
                    </x-slot>
            
                    <x-slot name="content" >
                        <div class="bg-gray-500 rounded-xl p-4">
                            <div class="mb-4 ">
                                <x-label value="descripción"/>
                                <textarea wire:init="inicializarValores" wire:model="detalle.description" class="w-full rounded-xl text-gray-700"></textarea>
                                <x-input-error for="detalle.description"/>
                            </div>

                            <div class="mb-4">
                                <x-label  value="Detalle o Termino"/>
                                <x-input class="form-radio text-indigo-600" type="radio" name="opcion" value="1"  wire:model.defer="detalle.status"/> <span class="text-gray-200">Detalle</span> 
                                <x-input class="form-radio text-indigo-600 ml-4" type="radio" name="opcion" value="2" wire:model.defer="detalle.status"/> <span class="text-gray-200">Termino</span>
            
                                <x-input-error for="detalle.description"/>
                            </div>
                        </div>

                    </x-slot >
            
                    <x-slot name="footer" >
                        <div class="flex justify-between w-full">
                            <div class="">
                                <x-danger-button wire:click="$set('openDetalles_edit', false)" >Cerrar</x-danger-button>
                            </div>
            
                            <div class="flex justify-between">
            
                                <span class="spinner border-4 border-solid w-8 h-8 rounded-full border-t-4 border-blue-500 border-l-transparent animate-spin mr-4" wire:loading wire:target="updateDetalles"></span>
                            
                                <x-secondary-button wire:click="updateDetalles({{$detalle}})" wire:loading.attr="disabled" wire:loading.class="bg-blue-100" wire:target="updateDetalles" class="disabled:opacity-25">Guardar</x-secondary-button>
                            </div>
                        </div>
                    </x-slot>
                </x-dialog-modal>
                {{-- lista Detalles --}}

                <h2 class="text-gray-200 my-3 text-lg">Seleccionar detalles</h2>
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg rounded-xl border border-gray-300 bg-gray-100 mt-3">
                    <table class="w-full text-sm text-left text-gray-100 dark:text-gray-100 border-none">
                        <thead class="text-xs text-gray-100 uppercase bg-gray-50 dark:bg-gray-500 dark:text-gray-100 border-none">
                            <tr>
                                <th class="px-6 py-3 border-none col-md-10">
                                    Descripcion
                                </th>
                                <th class="px-6 py-3 border-none col-md-2">
                                    Acciones
                                </th>
                            </tr>
                        </thead>
                        <tbody >
                            @if($detalles->count())
                                @foreach ($detalles as $detalle)
                                    @if ($detalle->status == 1)
                                        <tr class="bg-white border-b dark:bg-gray-100 dark:border-gray-100">
                                            <td class="px-6 py-4 border-r-0 border-l-0 text-black">
                                                <input type="checkbox" class="form-checkbox rounded border border-gray-500 text-gray-600" wire:model="isCheckedDetalles" value="{{ $detalle->id }}"> <span class="mr-3"></span>{{ $detalle->description }}
                                            </td>
                                            <td class="px-6 py-4 border-r-0 border-l-0">
                                                <div class="flex">
                                                    @livewire('admin.bills.edit-detalle', ['detalle' => $detalle], key('detalle'.$detalle->id))

                                                    <a class="btn btn-danger btn-sm mr-4" wire:click="deleteDetalles({{$detalle}})">
                                                        <i class="fa fa-trash"></i>    
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>

                <hr class="bg-white mt-3">

                {{-- TERMINOS --}}
                <h2 class="text-gray-200 my-3 text-lg">Seleccionar terminos</h2>
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg rounded-xl border border-gray-300 bg-gray-100 mt-3 mb-4">
                    <table class="w-full text-sm text-left text-gray-100 dark:text-gray-100 border-none">
                        <thead class="text-xs text-gray-100 uppercase bg-gray-50 dark:bg-gray-500 dark:text-gray-100 border-none">
                            <tr>
                                <th class="px-6 py-3 border-none col-md-10">
                                    Descripcion
                                </th>
                                <th class="px-6 py-3 border-none col-md-2">
                                    Acciones
                                </th>
                            </tr>
                        </thead>
                        <tbody >
                            @if($detalles->count())
                                @foreach ($terminos as $termino)
                                    @if ($termino->status == 2 )
                                        <tr class="bg-white border-b dark:bg-gray-100 dark:border-gray-100">
                                            <td class="px-6 py-4 border-r-0 border-l-0 text-black">
                                                <input type="checkbox"  class="form-checkbox rounded border border-gray-500 text-gray-600" wire:model="isCheckedTerminos" value="{{ $termino->id }}"> <span class="mr-3"></span> {{ $termino->description }}
                                            </td>
                                            <td class="px-6 py-4 border-r-0 border-l-0">
                                                <div class="flex">

                                                    @livewire('admin.bills.edit-detalle', ['detalle' => $termino], key('termino'.$termino->id))
                                                    <a class="btn btn-danger btn-sm mr-4" wire:click="deleteDetalles({{$termino}})" wire:loading.attr="disabled" wire:target="deleteDetalles">
                                                        <i class="fa fa-trash"></i>  
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>

                <hr class="bg-white mt-3 mb-3">

                {{-- BOTON GUARDAR --}}
                <div class="flex justify-between w-full">
                    <div class="flex justify-between">

                        <span class="spinner border-4 border-solid w-8 h-8 rounded-full border-t-4 border-blue-500 border-l-transparent animate-spin mr-4" wire:loading wire:target="save"></span>
                    
                        <x-secondary-button wire:click="save" wire:loading.attr="disabled" wire:loading.class="bg-blue-100" wire:target="save" class="disabled:opacity-25">Guardar</x-secondary-button>
                    </div>
                </div>
                {{-- TERMINOS FIN --}}
            </div>
        </div>
    
    </div>

            
</div>

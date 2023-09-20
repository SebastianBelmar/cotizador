<div>
    <div class="card rounded-[20px]">
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

            {{-- boton modal crear--}}
            <x-danger-button wire:click="$set('open', true)">
                Agregar Item
            </x-danger-button>
            {{-- ventana modal crear -- CON Alpine.JS--}}
            {{-- <x-dialog-modal wire:model="open" class="text-black bg-black"> 
                <x-slot name="title" >
                    <span class="text-black"> Item </span>
                </x-slot>
        
                <x-slot name="content" >
                    <div class="bg-gray-500 rounded-xl p-4" x-data="{ selectedNumber: '', lenght: '', result: @entangle('price'), width : '', quantity: '', codigo: ''}">

                        <div class="mb-4 ">
                            <x-label value="Productos"/>
                            <select class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline" x-model="selectedNumber" @change="calculateResult">
            
                                <option value="null" selected>--Seleccione un Producto--</option>
                                @foreach ($productos as $producto)
                                    <option value="{{$producto}}"><strong>ID</strong>: {{$producto->id}} -- <strong>NOMBRE</strong>: {{$producto->name}} -- <strong>PRECIO</strong>: {{$producto->price}}</option>
                                @endforeach 
                            </select>
                        </div>

                        <div class="mb-4">
                            <x-label value="Codigo"/>
                            <p x-show="codigo"><span class="text-5xl text-gray-300" x-text="codigo"></span></p>
                        </div>
                        
                        <div class="mb-4">
                            <x-label value="Descripcion"/>
                            <x-input type="text" wire:model="name" placeholder="Descripcion" class="w-full" />    
            
                            <x-input-error for="name"/>
                        </div>

                        <div class="mb-4">
                            <x-label value="Largo [metros]"/>
                            <x-input type="number" wire:model="lenght" placeholder="Largo" class="w-full" x-model="lenght" @input="calculateResult" placeholder="Ingresa un número" />    
            
                            <x-input-error for="lenght"/>
                        </div>

                        <div class="mb-4">
                            <x-label value="Ancho [metros]"/>
                            <x-input type="number" wire:model="width" placeholder="Ancho" class="w-full" x-model="width" @input="calculateResult" />    
            
                            <x-input-error for="width"/>
                        </div>

                        <div class="mb-4">
                            <x-label value="Cantidad"/>
                            <x-input type="number" wire:model="quantity" placeholder="Cantidad" class="w-full" x-model="quantity" @input="calculateResult" />    
            
                            <x-input-error for="quantity"/>
                        </div>

                        <div class="mb-4">
 
                            <x-label value="Precio"/>
                            <p x-show="result"><span class="text-5xl text-gray-300" x-text="result"></span></p>

                        </div>
            
                    </div>
                </x-slot >
        
                <x-slot name="footer" >
        
                    <div class="flex justify-between w-full">
                        <div class="">
                            <x-danger-button wire:click="$set('open', false)" >Cerrar</x-danger-button>
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
                            wire:target="createItem"
                            >
                            </span>
                        
                            <x-secondary-button wire:click="createItem" wire:loading.attr="disabled" wire:loading.class="bg-blue-100" wire:target="save" class="disabled:opacity-25">Guardar</x-secondary-button>
                        </div>
                    </div>
        
        
        
                </x-slot>
        
            </x-dialog-modal> --}}

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
                            <x-input type="text" wire:model="name" placeholder="Descripcion" class="w-full" />    
        
                            <x-input-error for="name"/>
                        </div>
        
                        <div class="mb-4">
                            <x-label value="Largo [metros]"/>
                            <x-input type="number" wire:model="lenght" placeholder="Largo" class="w-full" placeholder="Ingresa un número" wire:change="calcular()" />    
            
                            <x-input-error for="lenght"/>
                        </div>
        
                        <div class="mb-4">
                            <x-label value="Ancho [metros]"/>
                            <x-input type="number" placeholder="Ancho" wire:model="width" class="w-full" wire:change="calcular()" />
                            
                            <x-input-error for="width"/>
                        </div>
        
                        <div class="mb-4">
                            <x-label value="Cantidad"/>
                            <x-input type="number" wire:model="quantity" wire:change="calcular()" placeholder="Cantidad" class="w-full" />
        
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


            <div class="p-1"></div>

            {{-- lista item  --}}
            <div class="card">

                <div class="card-body bg-gray">

                    @if($items->count())
                    {{-- para una coleccion $cotizaciones->count() --}}
                        <table class="table table-striped">
                            <thead class="bg-gray-500">
                                <tr>
                                    <th scope="col" class="w-20 px-8 py-4 text-left text-sm font-medium text-gray-100 uppercase pointer">
                                        CODE
                                    </th>
                                    <th scope="col" class="w-20 px-8 py-4 text-left text-sm font-medium text-gray-100 uppercase pointer">
                                        Nombre
                                    </th>
                                    <th scope="col" class="w-20 px-8 py-4 text-left text-sm font-medium text-gray-100 uppercase pointer">
                                                       
                                        Cantidad
                                    </th>
                                    <th scope="col" class="w-20 px-8 py-4 text-left text-sm font-medium text-gray-100 uppercase pointer">
                                        Precio
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($items as $item)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">{{ $item->code }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">{{ $item->name }}</div>
                                        </td>
        
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">{{ $item->quantity}}</div>
                                        </td> 

                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">{{ $item->price}}</div>
                                        </td> 

                                        <td width=10px class="d-flex justify-content-between">
                                            {{-- con anidamiento --}}
                                            @livewire('admin.bills.edit-item', ['item' => $item], key($item->id))
                                            {{-- sin anidamiento --}}
                                            <a class="btn btn-secondary btn-sm mr-4" wire:click="edit({{$item}})">
                                                <i class="fa fa-edit"></i>    
                                            </a>
                                            <a class="btn btn-danger btn-sm mr-4" wire:click="delete({{$item}})">
                                                <i class="fa fa-trash"></i>    
                                            </a>
                                        </td>                     
        
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>

            <div class="mb-4 ">
                <x-label value="Descuento"/>
                <x-input type="number" wire:model="descuento" placeholder="valor descuento" class="w-full bg-white" />    

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
                
                    <x-secondary-button wire:click="create" wire:loading.attr="disabled" wire:loading.class="bg-blue-100" wire:target="save" class="disabled:opacity-25">Guardar</x-secondary-button>
                </div>
            </div>

        </div>
    </div>
</div>

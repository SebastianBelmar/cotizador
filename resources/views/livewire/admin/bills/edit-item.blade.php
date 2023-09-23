<div>
    <a class="btn btn-primary btn-sm mr-4" wire:click="$set('open', true)">
        <i class="fa fa-edit"></i>    
    </a>

    {{-- modal --}}
    <x-dialog-modal wire:model="open" class="text-black bg-black"> 
        <x-slot name="title" >
            <span class="text-black"> Item</span>
        </x-slot>

        <x-slot name="content" >

            <div class="bg-gray-500 rounded-xl p-4">

                <div class="mb-4 ">

                    <x-label value="Productos"/>
                    <select wire:init="inicializarValores" wire:model="item.code" wire:change="calcular()" class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">                               
                        @foreach ($productos as $producto)
                                <option value="{{$producto->code}}"><strong>ID</strong>: {{$producto->id}} -- <strong>NOMBRE</strong>: {{$producto->name}} -- <strong>PRECIO</strong>: {{$producto->price}}</option>
                        @endforeach 

                    </select>
                </div>

                <div class="mb-4">
                    <x-label value="Codigo"/>
                    {{$item->code}}

                    <x-input-error for="item.code"/>
                </div>
                
                <div class="mb-4">
                    <x-label value="Descripcion"/>
                    <x-input type="text" wire:model="item.name" placeholder="Descripcion" class="w-full" />    

                    <x-input-error for="item.name"/>
                </div>

                <div class="mb-4">
                    <x-label value="Largo [metros]"/>
                    <x-input type="number" wire:model="item.lenght" placeholder="Largo" class="w-full" placeholder="Ingresa un número" wire:change="calcular()" />    
    
                    <x-input-error for="item.lenght"/>
                </div>

                <div class="mb-4">
                    <x-label value="Ancho [metros]"/>
                    <x-input type="number" placeholder="Ancho" wire:model="item.width" class="w-full pl-10 pr-4 py-2" wire:change="calcular()" />
                    
                    <x-input-error for="item.width"/>
                </div>

                <div class="mb-4">
                    <x-label value="Cantidad"/>
                    <x-input type="number" wire:model="item.quantity" wire:change="calcular()" placeholder="Cantidad" class="w-full" />

                    <x-input-error for="item.quantity"/>
                </div>

                <div class="mb-4">

                    <x-label value="Precio"/>

                    <span class="text-gray-200 text-xl text-bold" wire:init="inicializarValores">{{ $precio }}</span>

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
                
                    <x-secondary-button wire:click="save" wire:loading.attr="disabled" wire:loading.class="bg-blue-100" wire:target="save" class="disabled:opacity-25">Guardar</x-secondary-button>
                </div>
            </div>



        </x-slot>

    </x-dialog-modal>
</div>

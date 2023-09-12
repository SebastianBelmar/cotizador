<div>
    <a class="btn btn-primary btn-sm mr-4" wire:click="$set('open', true)">
        <i class="fa fa-edit"></i>    
    </a>
    
    <x-dialog-modal wire:model="open" >

        <x-slot name='title'>
            <p class="text-black"> la Cotizacion {{$cotizacion->fecha}} </p>
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

<div>

    <x-danger-button wire:click="$set('open', true)">
        Crear nuevo post
    </x-danger-button>

    <x-dialog-modal wire:model="open">
        <x-slot name="title">
            Crear cotizacion
        </x-slot>

        <x-slot name="content">
            <div class="mb-4">
                <x-label value="Fecha"/>
                <x-input type="date" wire:model="fecha" class="w-full" />

                <x-input-error for="fecha"/>
            </div>
            
            <div class="mb-4">
                <x-label value="Descuento"/>
                <x-input type="number" wire:model="descuento" placeholder="valor descuento" class="w-full" />    

                <x-input-error for="descuento"/>
            </div>

            <div class="mb-4">
                <x-label  value="Estado"/>
                <x-input  type="radio" name="opcion" value="1"  wire:model.defer="status"/> publicar
                <x-input type="radio" name="opcion" value="2" wire:model.defer="status"/> no publicar

                <x-input-error for="status"/>
            </div>
            <textarea class="form-control w-full"></textarea>
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

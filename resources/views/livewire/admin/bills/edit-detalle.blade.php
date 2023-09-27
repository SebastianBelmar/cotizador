<div>

    <a class="btn btn-primary btn-sm mr-4" wire:click="$set('open', true)">
        <i class="fa fa-edit"></i>    
    </a>


    <x-dialog-modal wire:model="open" class="text-black bg-black"> 
        <x-slot name="title" >
            <span class="text-black">Detalles o Terminos</span>
        </x-slot>

        <x-slot name="content" >
            <div class="bg-gray-500 rounded-xl p-4">
                <div class="mb-4 ">
                    <x-label value="descripción"/>
                    <textarea wire:model="detalle.description" class="w-full rounded-xl text-gray-700"></textarea>
                    <x-input-error for="detalle.description"/>
                </div>

                <div class="mb-4">
                    <x-label  value="Detalle o Termino"/>
                    <x-input class="form-radio text-indigo-600" type="radio" name="opcion" value="1"  wire:model.defer="detalle.status"/> <span class="text-gray-200">Detalle</span> 
                    <x-input class="form-radio text-indigo-600 ml-4" type="radio" name="opcion" value="2" wire:model.defer="detalle.status"/> <span class="text-gray-200">Termino</span>

                    <x-input-error for="detalle.status"/>
                </div>
            </div>

        </x-slot >

        <x-slot name="footer" >
            <div class="flex justify-between w-full">
                <div class="">
                    <x-danger-button wire:click="$set('open', false)" >Cerrar</x-danger-button>
                </div>

                <div class="flex justify-between">

                    <span class="spinner border-4 border-solid w-8 h-8 rounded-full border-t-4 border-blue-500 border-l-transparent animate-spin mr-4" wire:loading wire:target="save"></span>
                
                    <x-secondary-button wire:click="save" wire:loading.attr="disabled" wire:loading.class="bg-blue-100" wire:target="save" class="disabled:opacity-25">Guardar</x-secondary-button>
                </div>
            </div>
        </x-slot>
    </x-dialog-modal>
</div>

<div>

    <x-danger-button wire:click="$set('open', true)">
        enviar PDF
    </x-danger-button>

    <x-dialog-modal wire:model="open" class="text-black bg-black"> 
        <x-slot name="title" >
            <span class="text-black"> Enviar Cotizacion</span>
        </x-slot>

        <x-slot name="content" >

            <div class="bg-gray-500 rounded-xl p-4">
                
                <div class="mb-4">
                    <x-label value="Email destinatario"/>
                    <x-input type="email" wire:model="email" placeholder="email destinatario" class="w-full" />    

                    <x-input-error for="email"/>
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
                    wire:target="enviarPdf"
                    >
                    </span>
                
                    <x-secondary-button wire:click="enviarPdf" wire:loading.attr="disabled" wire:loading.class="bg-blue-100" wire:target="enviarPdf" class="disabled:opacity-25">Enviar</x-secondary-button>
                </div>
            </div>



        </x-slot>

    </x-dialog-modal>

</div>

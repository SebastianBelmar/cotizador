<x-dialog-modal-cotizacion wire:model="open1">
                    
    <x-slot name="title" >
        <div class="bg-blanco w-full py-2 rounded-t-3xl border-principal border-b-4 grid grid-cols-12 gap-4 px-6 lg:px-12">
            <p class="col-span-1 text-[3.5rem] font-semibold text-oscuro text-start">1</p>
            <div class="col-span-10 flex flex-col items-center justify-center my-auto">
                <p class="text-2xl text-oscuro font-semibold">Agregar Fecha y Cliente</p>
            </div>
            <div class="col-span-1 h-full flex items-center justify-end">
                <i class="ri-box-3-line text-principal text-4xl"></i>
            </div>
        </div>
    </x-slot>

    <x-slot name="content" >
        <div class="bg-blanco w-full p-4 px-6 lg:px-12 rounded-b-3xl  ">
            <div x-data="{cliente_id: @entangle('cliente_id')}">

                <div class="mt-4">
                    <p class="text-lg text-oscuro">Fecha Cotización</p>

                    <input 
                        class="rounded-lg bg-claro border-0 ring-2 ring-medioClaro focus:ring-principal focus:border-principal focus:ring-2 focus:border-1 p-4 mt-1" 
                        type="date"
                        wire:model='fecha'
                    >
                    <x-input-error for="fecha"/>
                </div>

                <div class="mt-4">
                    <p class="text-lg text-oscuro">ID Cliente</p>

                    @include('livewire.admin.cotizaciones.crear.inputs.input1')

                    <x-input-error for="cliente_id"/>
                </div>



                <div class="grid grid-cols-2 gap-4 my-6">
                    <button @click="open1= false"
                        class="w-full bg-blanco text-lg lg:text-2xl font-semibold border-2 hover:border-2 border-danger rounded-xl text-danger hover:text-blanco  hover:bg-danger py-4"
                    >
                        CERRAR
                    </button>

                    <button
                        class="w-full bg-principal text-lg lg:text-2xl font-semibold border-principal border-2  rounded-xl text-blanco hover:text-principal hover:bg-blanco hover:border-2 hover:border-principal py-4"
                        wire:click="guardarCliente" wire:loading.attr="disabled" wire:loading.class="bg-medioClaro  hover:bg-medioClaro cursor-not-allowed"
                    >
                        LISTO
                    </button>
                </div>

            </div>
        </div>
    </x-slot >

    <x-slot name="footer">
    </x-slot>

</x-dialog-modal-cotizacion>
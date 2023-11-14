<x-dialog-modal-cotizacion wire:model="nuevo3">

    <x-slot name="title" >
        <div class="bg-blanco w-full py-4 rounded-t-3xl border-principal border-b-4 grid grid-cols-12 gap-4 px-6 lg:px-12">
            <div class="col-span-11 flex flex-col items-center justify-center my-auto">
                <p class="text-2xl text-oscuro font-semibold">Agregando nuevo detalle</p>
            </div>
            <div class="col-span-1 h-full flex items-center justify-end">
                <i class="ri-file-list-3-line text-principal text-4xl"></i>
            </div>
        </div>
    </x-slot>


    <x-slot name="content" >

        <div x-data="{detallesCotizacion: @entangle('detallesCotizacion') }"
        class="font-semibold text-oscuro rounded-b-3xl h-full w-full mx-auto mb-0"
        >

            <div class="scroll-container overflow-x-auto">
                <div class="grid grid-cols-12 bg-blanco p-4 text-start  text-lg w-full min-w-[480px] gap-4 ">

                    <div class="col-span-12 text-medio font-normal text-xl px-6">
                        <p class="mb-4">Redacción del detalle</p>

                        <textarea class="w-full h-40 rounded-2xl border text-oscuro rounded-br-md bg-claro border-principal focus:border-principal focus:ring-principal" wire:model="nuevoDetalle"></textarea>

                        <x-input-error for="nuevoDetalle"/>
                    </div>           

                    
                </div>

            </div>
        </div>
    </x-slot>

    <x-slot name="footer">
        <div class="bg-blanco w-full py-2 rounded-b-3xl px-6">
            <div class=" w-full grid grid-cols-2 gap-4 my-6">
                <button @click="nuevo3= false"
                    class="w-full bg-blanco text-lg lg:text-2xl font-semibold border-2 hover:border-2 border-danger rounded-xl text-danger hover:text-blanco  hover:bg-danger py-4"
                >
                    CERRAR
                </button>

                <button
                    class="w-full bg-principal text-lg lg:text-2xl font-semibold border-principal border-2  rounded-xl text-blanco hover:text-principal hover:bg-blanco hover:border-2 hover:border-principal py-4"
                    wire:click="guardarDetalle"
                >
                    GUARDAR
                </button>
            </div>
        </div>
    </x-slot>

</x-dialog-modal-cotizacion>
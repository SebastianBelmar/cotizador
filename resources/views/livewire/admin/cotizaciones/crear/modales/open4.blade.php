<x-dialog-modal-cotizacion wire:model="open4">

    <x-slot name="title" >
        <div class="bg-blanco w-full py-2 rounded-t-3xl border-principal border-b-4 grid grid-cols-12 gap-4 px-6 lg:px-12">
            <p class="col-span-1 text-[3.5rem] font-semibold text-oscuro text-start">4</p>
            <div class="col-span-10 flex flex-col items-center justify-center my-auto">
                <p class="text-2xl text-oscuro font-semibold">Términos</p>
            </div>
            <div class="col-span-1 h-full flex items-center justify-end">
                <i class="ri-shake-hands-line text-principal text-4xl"></i>
            </div>
        </div>
        <div class="bg-blanco w-full rounded-b-3xl px-6">
            <div class="pt-4 text-xl font-bold  rounded-t-3xl text-oscuro text-center">
                <button class="w-full bg-blanco text-lg lg:text-xl font-semibold border-principal border lg:border-2 rounded-xl text-principal hover:text-principal hover:bg-claro hover:border-principal py-4 mb-4" wire:click="$set('nuevo4', true)">AGREGAR NUEVO TÉRMINO</button>

                @include('livewire.admin.cotizaciones.crear.inputs.input4')
            </div>
        </div>
    </x-slot>


    <x-slot name="content" >

        <div x-data="{terminosCotizacion: @entangle('terminosCotizacion') }"
        class="font-semibold text-oscuro rounded-b-3xl h-full w-full mx-auto mb-0"
        >

            <div class="scroll-container overflow-x-auto">
                <div class="grid grid-cols-12 bg-blanco p-4 text-start  text-lg w-full min-w-[480px] gap-4 border-b border-medioClaro">

                    <div class="col-span-12 text-medio font-normal text-xl px-6">
                        Los últimos términos creados
                    </div>
                </div>

                @foreach($terminosCotizacion as $indice => $item)

                    <div class="grid grid-cols-12 bg-blanco font-normal text-oscuro text-md p-4  w-full min-w-[480px] gap-4 border-b border-medioClaro">


                        <div class="col-span-9 hidden px-6 lg:flex" x-data="{ mostrar: true }">
                            @php 
                                if (strlen( $item['description']) > 80) {
                                    $textoTruncado = substr( $item['description'] , 0, 80) . '...';
                                } else {
                                    $textoTruncado =  $item['description'];
                                }
                            @endphp

                            <button class="w-full text-start" x-show="!mostrar" @click="mostrar = !mostrar">{{  $item['description']}}</button>
                            <button x-show="mostrar" @click="mostrar = !mostrar" >{{  $textoTruncado }}</button>                       
                        </div>

                        <div class="col-span-9 hidden px-6 md:flex lg:hidden" x-data="{ mostrar: true }">
                            @php 
                                if (strlen( $item['description']) > 50) {
                                    $textoTruncado = substr( $item['description'] , 0, 50) . '...';
                                } else {
                                    $textoTruncado =  $item['description'];
                                }
                            @endphp

                            <button class="w-full text-start" x-show="!mostrar" @click="mostrar = !mostrar">{{  $item['description']}}</button>
                            <button x-show="mostrar" @click="mostrar = !mostrar" >{{  $textoTruncado }}</button>                       
                        </div>

                        <div class="col-span-9 flex px-6 md:hidden" x-data="{ mostrar: true }">
                            @php 
                                if (strlen( $item['description']) > 35) {
                                    $textoTruncado = substr( $item['description'] , 0, 35) . '...';
                                } else {
                                    $textoTruncado =  $item['description'];
                                }
                            @endphp

                            <button class="w-full text-start" x-show="!mostrar" @click="mostrar = !mostrar">{{  $item['description']}}</button>
                            <button x-show="mostrar" @click="mostrar = !mostrar" >{{  $textoTruncado }}</button>                       
                        </div>

                        <div class="col-span-3 flex justify-start items-center ">
                            <button wire:click="editarTermino('{{$indice}}');"><i class="ri-edit-line text-2xl text-principal transition-all ease-in-out duration-500 hover:blur-[1px] mr-4"></i></button>
                            <button wire:click="borrarTermino('{{$indice}}')"><i class="ri-delete-bin-line text-2xl transition-all ease-in-out duration-500  hover:blur-[1px]  text-danger"></i></button>
                        </div>
                    </div>
                @endforeach
                <div class="grid grid-cols-12 bg-blanco p-1  w-full min-w-[480] gap-4">
                </div>
            </div>
        </div>
    </x-slot>

    <x-slot name="footer">
        <div class="bg-blanco w-full py-2 rounded-b-3xl px-6">
            <div class=" w-full grid grid-cols-2 gap-4 my-6">
                <button @click="open4= false"
                    class="w-full bg-blanco text-lg lg:text-2xl font-semibold border-2 hover:border-2 border-danger rounded-xl text-danger hover:text-blanco  hover:bg-danger py-4"
                >
                    CERRAR
                </button>

                <button
                    class="w-full bg-principal text-lg lg:text-2xl font-semibold border-principal border-2  rounded-xl text-blanco hover:text-principal hover:bg-blanco hover:border-2 hover:border-principal py-4"
                    @click="open4= false"
                >
                    LISTO
                </button>
            </div>
        </div>
    </x-slot>

</x-dialog-modal-cotizacion>
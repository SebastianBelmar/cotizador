<x-dialog-modal-cotizacion wire:model="ver4">

    <x-slot name="title" >
        <div class="border-b border-b-medioClaro py-8 text-2xl font-semibold mt-4 rounded-t-3xl text-oscuro text-center">
            Resumen de términos(s) seleccionados
        </div>
    </x-slot>

    <x-slot name="content" >
        <div x-data="{terminosCotizacion: @entangle('terminosCotizacion') }"
        class="font-semibold text-oscuro rounded-b-3xl h-full w-full mx-auto mb-0"
        >

            <div class="scroll-container overflow-x-auto">

                @foreach($terminosCotizacion as $indice => $item)

                    <div class="grid grid-cols-12 bg-blanco font-normal text-oscuro text-md p-4  w-full min-w-[480px] gap-4 border-b border-medioClaro">


                        <div class="col-span-12 hidden px-6 lg:flex" x-data="{ mostrar: true }">
                            @php 
                                if (strlen( $item['description']) > 110) {
                                    $textoTruncado = substr( $item['description'] , 0, 110) . '...';
                                } else {
                                    $textoTruncado =  $item['description'];
                                }
                            @endphp

                            <button class="w-full text-start" x-show="!mostrar" @click="mostrar = !mostrar">{{  $item['description']}}</button>
                            <button x-show="mostrar" @click="mostrar = !mostrar" >{{  $textoTruncado }}</button>                       
                        </div>

                        <div class="col-span-12 hidden px-6 md:flex lg:hidden" x-data="{ mostrar: true }">
                            @php 
                                if (strlen( $item['description']) > 70) {
                                    $textoTruncado = substr( $item['description'] , 0, 70) . '...';
                                } else {
                                    $textoTruncado =  $item['description'];
                                }
                            @endphp

                            <button class="w-full text-start" x-show="!mostrar" @click="mostrar = !mostrar">{{  $item['description']}}</button>
                            <button x-show="mostrar" @click="mostrar = !mostrar" >{{  $textoTruncado }}</button>                       
                        </div>

                        <div class="col-span-12 flex px-6 md:hidden" x-data="{ mostrar: true }">
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
                    </div>
                @endforeach
                <div class="grid grid-cols-12 bg-blanco p-1  w-full min-w-[480] gap-4">
                </div>
            </div>
        </div>
    </x-slot>


    <x-slot name="footer">
        <div class="bg-blanco w-full py-6 rounded-b-3xl px-6">

        </div>
    </x-slot>

</x-dialog-modal-cotizacion>
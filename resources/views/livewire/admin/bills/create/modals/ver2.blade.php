<div
    x-on:keydown.escape.window="ver2 = false"
    x-show="ver2"
    class="jetstream-modal fixed top-8 inset-0 overflow-y-auto px-4 py-6 sm:px-0 z-50"
    style="display: none;"
    >
    <div x-show="ver2" class="fixed inset-0 transform transition-all " x-on:click="ver2 = false" x-transition:enter="ease-out duration-300"
                    x-transition:enter-start="opacity-0"
                    x-transition:enter-end="opacity-100"
                    x-transition:leave="ease-in duration-200"
                    x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0">
        <div class="absolute inset-0 bg-oscuro opacity-75"></div>
    </div>

    <div x-show="ver2" class="mb-6 bg-blanco rounded-3xl shadow-xl transform transition-all w-10/12 min-w-[480px] max-w-[1920px] mx-auto"
                    x-trap.inert.noscroll="ver2"
                    x-transition:enter="ease-out duration-300"
                    x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                    x-transition:leave="ease-in duration-200"
                    x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                    x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
        >

        <div class="border-2 border-medioClaro py-4 text-xl font-bold mt-4 rounded-t-3xl text-oscuro text-center">
            Resumen de producto(s) seleccionados
        </div>

        <div x-data="{datos: @entangle('datosClientes') }"
            class="font-semibold text-oscuro rounded-b-3xl h-full w-full mx-auto mb-0 border-2 border-medioClaro"
            >

            <div class="scroll-container overflow-x-auto">
                <div class="grid grid-cols-12 bg-oscuro p-4 text-start text-blanco text-md w-full min-w-[1080px] gap-4">
                    <div class="col-span-1">
                        Código
                    </div>
                    <div class="col-span-2">
                        Nombre Producto
                    </div>
                    <div class="col-span-3">
                        Descripción
                    </div>
                    <div class="col-span-2">
                        Cantidad
                    </div>
                    <div class="col-span-2">
                        Valor
                    </div>
                    <div class="col-span-2">
                        Acciones
                    </div>
                </div>
                @php
                    $total = 0 
                @endphp
                @foreach($datosItems as $indice => $item)
                    @php
                        $total += $item['total'];
                    @endphp
                    <div class="grid grid-cols-12 bg-blanco font-normal text-oscuro text-md p-4  w-full min-w-[1080px] gap-4">
                        <div class="col-span-1">
                            {{$item['codigo']}}
                        </div>
                        <div class="col-span-2">
                            {{$item['nombre']}}
                        </div>
                        <div class="col-span-3 flex" x-data="{ mostrar: true }">
                            @php 
                                if (strlen( $item['descripcion']) > 20) {
                                    $textoTruncado = substr( $item['descripcion'] , 0, 20) . '...';
                                } else {
                                    $textoTruncado =  $item['descripcion'];
                                }
                            @endphp

                            <button class="w-full text-start" x-show="!mostrar" @click="mostrar = !mostrar">{{  $item['descripcion']}}</button>
                            <button x-show="mostrar" @click="mostrar = !mostrar" >{{  $textoTruncado }}</button>
                            
                            
                        </div>
                        <div class="col-span-2">
                            {{$item['cantidad']}}
                        </div>
                        <div class="col-span-2">
                            ${{number_format($item['total'], 0, '.', '.');}}
                        </div>
                        <div class="col-span-2 flex justify-start items-center">
                            <button @click="open2edit = true" wire:click="editarItem('{{$indice}}')"><i class="ri-edit-line text-2xl text-principal transition-all ease-in-out duration-500 hover:blur-[1px] mr-4"></i></button>
                            <button wire:click="borrarItem('{{$indice}}')"><i class="ri-delete-bin-line text-2xl transition-all ease-in-out duration-500  hover:blur-[1px]  text-danger"></i></button>
                        </div>
                    </div>
                @endforeach

            </div>

            <div class="flex flex-row w-full">
                <div class="border-medioClaro border-b-2 border-r-2 border-t-2 flex flex-col items-end justify-center p-4 w-full">
                    <p class="font-light">Neto</p>
                    <p class="text-xl font-bold">${{number_format($total, 0, '.', '.');}}</p>
                </div>
                <div class="border-medioClaro border-b-2 border-t-2 flex flex-col items-end justify-center p-4 w-full">
                    <p class="font-light">IVA</p>
                    <p class="text-xl font-bold">${{number_format($total*0.19, 0, '.', '.');}}</p>
                </div>
            </div>

            <div class="border-medioClaro border-b-2 flex flex-col items-center justify-center p-4 w-full">
                <p class="font-light">Precio Total Bruto Cotización</p>
                <p class="text-4xl font-bold">${{number_format($total*1.19, 0, '.', '.');}}</p>
            </div>

            <div class=" flex flex-col items-center justify-center p-4 w-full">
                <p class="font-light">Precio Final aplicando <span class="font-semibold">Descuento del 10%</span></p>
                <p class="text-4xl font-bold">${{number_format($total*0.9, 0, '.', '.');}}</p>
                <p class="font-light">Ahorro de ${{number_format($total*0.1, 0, '.', '.');}}</p>
            </div>

        </div>

    </div>
</div>
<x-dialog-modal-cotizacion wire:model="ver2">

    <x-slot name="title" >
        <div class="border-2 border-medioClaro py-4 text-xl font-bold mt-4 rounded-t-3xl text-oscuro text-center">
            Resumen de producto(s) seleccionados
        </div>
    </x-slot>

    <x-slot name="content" >
        <div x-data="{datosProductos: @entangle('datosProductos') }"
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
                @foreach($datosProductos as $indice => $item)
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
                            <button wire:click="editarProducto('{{$indice}}');"><i class="ri-edit-line text-2xl text-principal transition-all ease-in-out duration-500 hover:blur-[1px] mr-4"></i></button>
                            <button wire:click="borrarProducto('{{$indice}}')"><i class="ri-delete-bin-line text-2xl transition-all ease-in-out duration-500  hover:blur-[1px]  text-danger"></i></button>
                        </div>
                    </div>
                @endforeach
                <div class="grid grid-cols-12 bg-blanco p-1  w-full min-w-[1080px] gap-4">
                </div>
            </div>



            <div class="border-medioClaro border-t-2 flex flex-col items-center justify-center p-4 w-full" x-data="{opcion: 2}">
                <p class="font-light">Agregar descuento (%)</p>

                <div class="flex justify-center items-center gap-12 my-2">
                    <span>                    
                        <input class="bg-blanco mr-2 border-2 border-medioClaro hover:border-2 hover:border-blanco custom-radio hover:ring-2 focus:ring-principal hover:ring-principal hover:bg-principal active:ring-principal text-principal hover:text-principal" type="radio" x-model="opcion" value="1"/>Sí
                    </span>

                    <span>                    
                        <input class="bg-blanco mr-2 border-2 border-medioClaro hover:border-2 hover:border-blanco custom-radio hover:ring-2 focus:ring-principal hover:ring-principal hover:bg-principal active:ring-principal text-principal hover:text-principal" type="radio" x-model="opcion" wire:click="reiniciarDescuento" value="2"/>No
                    </span>

                </div>
                <div x-show="opcion == 1" class="w-full">
                    <input 
                    class="rounded-lg bg-claro w-full border-0 ring-2 ring-medioClaro focus:ring-principal focus:border-principal focus:ring-2 focus:border-1 p-4 mt-1 placeholder:text-lg" 
                    type="number"
                    wire:model="descuento"
                    placeholder="Ingrese el porcentaje de descuento"
                    >
                </div>
            </div>

            <div class="flex flex-row w-full">
                <div class="border-medioClaro border-b-2 border-r-2 border-t-2 flex flex-col items-end justify-center p-4 w-full">
                    @if($descuento)
                        <p class="font-light">Neto aplicando <span class="font-semibold">Descuento del {{number_format($descuento, 0, ',', '.')}}%</span></p>
                        <p class="text-xl font-bold">${{number_format($total*(100-$descuento)*0.01, 0, '.', '.');}}</p>
                        <p class="font-light">Ahorro de ${{number_format($total*$descuento*0.01, 0, '.', '.');}}</p>
                    @else
                        <p class="font-light">Neto</p>
                        <p class="text-xl font-bold">${{number_format($total, 0, '.', '.');}}</p>
                    @endif    
                </div>

                <div class="border-medioClaro border-b-2 border-t-2 flex flex-col items-end justify-center p-4 w-full">
                    @if($descuento)
                        <p class="font-light">IVA aplicando <span class="font-semibold">Descuento del {{number_format($descuento, 0, ',', '.')}}%</span></p>
                        <p class="text-xl font-bold">${{number_format($total*(100-$descuento)*0.01*0.19, 0, '.', '.');}}</p>
                        <p class="font-light">Ahorro de ${{number_format($total*0.19*$descuento*0.01, 0, '.', '.');}}</p>
                    @else
                        <p class="font-light">IVA</p>
                        <p class="text-xl font-bold">${{number_format($total*0.19, 0, '.', '.');}}</p>
                    @endif    
                </div>
            </div>

            <div class=" flex flex-col items-center justify-center p-4 w-full">
                @if($descuento)
                    <p class="font-light">Precio Final aplicando <span class="font-semibold">Descuento del {{$descuento}}%</span></p>
                    <p class="text-4xl font-bold">${{number_format($total*1.19*(100 - $descuento)*0.01, 0, '.', '.');}}</p>
                    <p class="font-light">Ahorro de ${{number_format($total*1.19*$descuento*0.01, 0, '.', '.');}}</p>
                @else
                    <p class="font-light">Precio Final</p>
                    <p class="text-4xl font-bold">${{number_format($total*1.19, 0, '.', '.');}}</p>  
                @endif           
            </div>

        </div>
    </x-slot>

    <x-slot name="footer">
    </x-slot>

</x-dialog-modal-cotizacion>
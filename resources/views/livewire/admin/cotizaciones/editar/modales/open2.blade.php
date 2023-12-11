<x-dialog-modal-cotizacion wire:model="open2">

    <x-slot name="title" >
        <div class="bg-blanco w-full py-2 rounded-t-3xl border-principal border-b-4 grid grid-cols-12 gap-4 px-6 lg:px-12">
            <p class="col-span-1 text-[3.5rem] font-semibold text-oscuro text-start">2</p>
            <div class="col-span-10 flex flex-col items-center justify-center my-auto">
                <p class="text-2xl text-oscuro font-semibold">Agregar Producto(s)</p>
            </div>
            <div class="col-span-1 h-full flex items-center justify-end">
                <i class="ri-box-3-line text-principal text-4xl"></i>
            </div>
        </div>
    </x-slot>

    <x-slot name="content" >
        <div class="bg-blanco w-full p-4 px-6 lg:px-12 rounded-b-3xl">
            <div x-data="{productoCodigo: @entangle('productoCodigo'),  productoDescripcion: @entangle('productoDescripcion'), productoPrecio: @entangle('productoPrecio'), productoLargo: @entangle('productoLargo').defer, productoAncho: @entangle('productoAncho').defer, productoCantidad: @entangle('productoCantidad').defer}">

                <div class="mt-4">
                    <button class="text-lg text-oscuro cursor-text" style="user-select: text;">Seleccionar Producto por Código</button>

                    @include('livewire.admin.cotizaciones.crear.inputs.input2')

                    <x-input-error for="productoCodigo"/>
                    <x-input-error for="productoPrecio"/>
                </div>

                <div class="mt-4 flex">
                    <div class="mr-4 md:mr-12">
                        <p class="text-lg text-oscuro">Código Producto</p>
                        <p class="text-2xl font-semibold text-oscuro">{{$productoCodigo}}</p>
                    </div>

                    <div class="mr-4 md:mr-12">
                        <p class="text-lg text-oscuro">Nombre Producto</p>
                        <p class="text-2xl font-semibold text-oscuro">{{$productoNombre}}</p>
                    </div>

                    <div>
                        <p class="text-lg text-oscuro">Precio Producto</p>
                        <p class="text-2xl font-semibold text-oscuro" x-text="'$'+( (productoPrecio) ? productoPrecio : '')"></p>
                    </div>


                </div>

                <div class="mt-4">
                    <p class="text-lg text-oscuro">Descripción</p>

                    <input
                        class="rounded-lg bg-claro border-0 ring-2 ring-medioClaro focus:ring-principal focus:border-principal focus:ring-2 focus:border-1 p-4 mt-1 placeholder:text-lg"
                        type="text"
                        wire:model='productoDescripcion'
                        placeholder="Ingrese descripción del producto"
                    >
                    <x-input-error for="productoDescripcion"/>
                </div>

                <div x-data="{opcion: @entangle('opcion')}" class="mt-4">
                    <label class="text-oscuro text-lg">Calcular precio mediante:</label>
                    <div class="flex ">
                        <label class="mr-6 flex items-center">
                            <input
                                class="bg-blanco mr-2 border-2 border-medioClaro hover:border-2 hover:border-blanco custom-radio hover:ring-2 focus:ring-principal hover:ring-principal hover:bg-principal active:ring-principal text-principal hover:text-principal"
                                type="radio"
                                wire:model="opcion"
                                value="1">
                            <p class="text-oscuro">Área</p>
                        </label>
                        <label class="flex items-center">
                            <input
                            class="bg-blanco mr-2 border-2 border-medioClaro hover:border-2 hover:border-blanco custom-radio hover:ring-2 focus:ring-principal hover:ring-principal hover:bg-principal active:ring-principal text-principal hover:text-principal"
                            type="radio"
                            wire:model="opcion"
                            value="2">
                            <p class="text-oscuro">Unidad</p>
                        </label>
                    </div>

                    <div class="mt-4">
                        <div x-show="(opcion == 1)" class="mt-4 grid grid-cols-2 grid-flow-row gap-8 text-left">
                            <div class="col-span-1">
                                <p class="text-lg text-oscuro">Largo (metros)</p>

                                <x-input-error for="productoLargo"/>

                                <input
                                    class="rounded-lg bg-claro border-0 ring-2 ring-medioClaro focus:ring-principal focus:border-principal focus:ring-2 focus:border-1 p-4 mt-1 placeholder:text-lg"
                                    type="number"
                                    wire:model="productoLargo"
                                    placeholder="Ingrese largo en metros"
                                    >
                            </div>

                            <div class="col-span-1">
                                <p class="text-lg text-oscuro">Ancho (metros)</p>

                                <x-input-error for="productoAncho"/>

                                <input
                                    class="rounded-lg bg-claro border-0 ring-2 ring-medioClaro focus:ring-principal focus:border-principal focus:ring-2 focus:border-1 p-4 mt-1 placeholder:text-lg"
                                    type="number"
                                    wire:model="productoAncho"
                                    placeholder="Ingrese ancho en metros"
                                    >
                            </div>
                        </div>

                        <div class="mt-4 grid grid-cols-2 grid-flow-row gap-8 text-left">
                            <div class="col-span-1">
                                <p class="text-lg text-oscuro">Cantidad</p>

                                <x-input-error for="productoCantidad"/>

                                <input
                                    class="rounded-lg bg-claro border-0 ring-2 ring-medioClaro focus:ring-principal focus:border-principal focus:ring-2 focus:border-1 p-4 mt-1 placeholder:text-lg"
                                    type="number"
                                    wire:model="productoCantidad"
                                    placeholder="Ingrese la cantidad"
                                    >
                            </div>
                            <div class="col-span-1 ">
                                <div class="text-right flex flex-col items-end justify-between h-full">
                                    <p class="text-lg text-oscuro">Valor Bruto </p>
                                    <p class="text-lg text-oscuro">del Producto</p>
                                    <p class="text-4xl text-oscuro font-bold" x-text="'$'+(
                                        (opcion == 1) ? ((productoCantidad * productoAncho * productoLargo * productoPrecio) ? productoTotal = (productoCantidad * productoAncho * productoLargo * productoPrecio).toFixed(0) : '' ) : ((productoCantidad *  productoPrecio) ? productoTotal = (productoCantidad  * productoPrecio).toFixed(0) : ''))"></p>
                                </div>
                                <x-input-error for="productoTotal"/>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="grid grid-cols-2 gap-4 my-6">
                    <button @click="open2= false"
                        class="w-full bg-blanco text-lg lg:text-2xl font-semibold border-2 hover:border-2 border-danger rounded-xl text-danger hover:text-blanco  hover:bg-danger py-4"
                    >
                        CERRAR
                    </button>

                    <button
                        class="w-full bg-principal text-lg lg:text-2xl font-semibold border-principal border-2  rounded-xl text-blanco hover:text-principal hover:bg-blanco hover:border-2 hover:border-principal py-4"
                        wire:click="guardarProducto" wire:loading.attr="disabled" wire:loading.class="bg-medioClaro  hover:bg-medioClaro cursor-not-allowed"
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

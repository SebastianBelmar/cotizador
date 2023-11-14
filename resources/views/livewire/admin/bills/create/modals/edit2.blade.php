<div
    x-on:keydown.escape.window="open2edit = false; activar = true; Livewire.emit('reinicioVariables');"
    x-show="open2edit"
    class="jetstream-modal fixed top-12 inset-0 overflow-y-auto px-4 py-6 sm:px-0 z-50"
    style="display: none;"
    >
    <div x-show="open2edit" class="fixed inset-0 transform transition-all " x-on:click="open2edit = false; activar = true; Livewire.emit('reinicioVariables');" 
                    x-transition:enter="ease-out duration-300"
                    x-transition:enter-start="opacity-0"
                    x-transition:enter-end="opacity-100"
                    x-transition:leave="ease-in duration-200"
                    x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0">
        <div class="absolute inset-0 bg-oscuro opacity-75"></div>
    </div>

    <div x-show="open2edit" class="mb-6 bg-blanco rounded-3xl shadow-xl transform transition-all w-10/12 min-w-[480px] max-w-[1920px] mx-auto"
                    x-trap.inert.noscroll="open2edit"
                    x-transition:enter="ease-out duration-300"
                    x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                    x-transition:leave="ease-in duration-200"
                    x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                    x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
        >

        <div class="bg-blanco w-full py-2 rounded-t-3xl border-principal border-b-4 grid grid-cols-12 gap-4 px-6 lg:px-12">
            <p class="col-span-1 text-[3.5rem] font-semibold text-oscuro text-start">2</p>
            <div class="col-span-10 flex flex-col items-center justify-center my-auto">
                <p class="text-2xl text-oscuro font-semibold">Agregar Producto(s)</p>
            </div>
            <div class="col-span-1 h-full flex items-center justify-end">
                <i class="ri-box-3-line text-principal text-4xl"></i>
            </div>
        </div>
        <div class="bg-blanco w-full p-4 px-6 lg:px-12 rounded-b-3xl  ">
            <div x-data="{ activar: @entangle('activar'), inputValue2: (this.producto_id == undefined ? '' : this.producto_id ) , isFocused2: false,  producto_id: @entangle('producto_id'),  productos: @entangle('productos2') , isShow: true , select: function() { this.clienteId = this.inputValue2} ,  itemDescripcion: @entangle('itemDescripcion'), itemCantidad: @entangle('itemCantidad'),  itemLargo: @entangle('itemLargo'), itemAncho: @entangle('itemAncho'), descripcion: ''}" @click.away = "isFocused2 = false" x-init="descripcion = $wire.get('itemDescripcion')">

                <button @click="Livewire.emit('actualizarEdit');">Actualizar</button>

                @if($errors->has('producto_id'))
                    @foreach ($errors->get('producto_id') as $error)
                            <p class = 'text-sm text-danger'>{{ $error }}</p>
                    @endforeach
                @endif

                @include('livewire.admin.bills.create.inputs.input2')

                <div class="flex flex-col">
                    <div class="flex justify-between mt-4">
                        <div class="flex flex-col w-1/3 justify-start">
                            <p class="text-lg text-oscuro">Código</p>
                            <p class="text-2xl font-semibold text-oscuro mt-4" x-text="selectProduct.code"></p>
                        </div>

                        <div class="flex flex-col w-2/3 justify-start">
                            <p class="text-lg text-oscuro">Nombre Producto</p>
                            <p class="text-2xl font-semibold text-oscuro mt-4" x-text="selectProduct.name"></p>
                        </div>
                    </div>
                    <div class="mt-4">
                        <p class="text-lg text-oscuro">Descripción</p>
                        @if($errors->has('itemDescripcion'))
                            @foreach ($errors->get('itemDescripcion') as $error)
                                <p class = 'text-sm text-danger'>{{ $error }}</p>
                            @endforeach
                        @endif
                        <input
                            wire:model='itemDescripcion'
                            name='descripcion'
                            class="hidden"
                            x-model="descripcion == undefined ? '': descripcion"
                            type="text"
                        >
                        <input 
                            class="rounded-lg bg-claro border-0 ring-2 ring-medioClaro focus:ring-principal focus:border-principal focus:ring-2 focus:border-1 p-4 mt-1" 
                            type="text"
                            x-model="descripcion"
                            @input="itemDescripcion = descripcion"
                        >
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
                                    @if($errors->has('itemLargo'))
                                        @foreach ($errors->get('itemLargo') as $error)
                                                <p class = 'text-sm text-danger'>{{ $error }}</p>
                                        @endforeach
                                    @endif
                                    <input 
                                        wire:model='itemLargo'
                                        name='largo'
                                        class="hidden" 
                                        x-model="item.largo == undefined ? '' : item.largo"
                                        >
                                    <input 
                                        class="rounded-lg bg-claro border-0 ring-2 ring-medioClaro focus:ring-principal focus:border-principal focus:ring-2 focus:border-1 p-4 mt-1" 
                                        type="number"
                                        x-model="item.largo"
                                        @input="itemLargo = item.largo;"
                                        >
                                </div>

                                <div class="col-span-1">
                                    <p class="text-lg text-oscuro">Ancho (metros)</p>
                                    @if($errors->has('itemAncho'))
                                        @foreach ($errors->get('itemAncho') as $error)
                                                <p class = 'text-sm text-danger'>{{ $error }}</p>
                                        @endforeach
                                    @endif
                                    <input 
                                        name='ancho'
                                        wire:model='itemAncho'
                                        class="hidden" 
                                        x-model="item.ancho == undefined ? '' : item.ancho"
                                        >
                                    <input 
                                        class="rounded-lg bg-claro border-0 ring-2 ring-medioClaro focus:ring-principal focus:border-principal focus:ring-2 focus:border-1 p-4 mt-1" 
                                        type="number"
                                        x-model="item.ancho"
                                        @input="itemAncho = item.ancho;"
                                        >
                                </div>
                            </div>

                            <div class="mt-4 grid grid-cols-2 grid-flow-row gap-8 text-left">
                                <div class="col-span-1">
                                    <p class="text-lg text-oscuro">Cantidad</p>
                                    @if($errors->has('itemCantidad'))
                                        @foreach ($errors->get('itemCantidad') as $error)
                                                <p class = 'text-sm text-danger'>{{ $error }}</p>
                                        @endforeach
                                    @endif
                                    <input 
                                        wire:model='itemCantidad'
                                        name='cantidad'
                                        class="hidden" 
                                        x-model="item.cantidad == undefined ? '' : item.cantidad"
                                    >
                                    <input 
                                        class="rounded-lg bg-claro border-0 ring-2 ring-medioClaro focus:ring-principal focus:border-principal focus:ring-2 focus:border-1 p-4 mt-1" 
                                        type="number"
                                        x-model="item.cantidad"
                                        @input="itemCantidad = item.cantidad;"
                                        >
                                </div>
                                <div class="col-span-1 ">
                                    <div class="text-right flex flex-col items-end justify-between h-full">
                                        <p class="text-lg text-oscuro">Valor Bruto </p>
                                        <p class="text-lg text-oscuro">del Producto</p>
                                        <p class="text-4xl text-oscuro font-bold" x-text="'$'+(
                                            (opcion == 1) ? ((item.cantidad * item.ancho * item.largo * selectProduct.price) ? item.price = (item.cantidad * item.ancho * item.largo * selectProduct.price).toFixed(2) : '' ) : ((item.cantidad *  selectProduct.price) ? item.price = (item.cantidad  * selectProduct.price).toFixed(2) : ''))"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4 mt-8 mb-2">
                    <button @click="open2edit= false ; if(inputValue2 != '') {icon1 = true; console.log('true')} else {icon1 = false ; console.log('false') }; activar = true; Livewire.emit('reinicioVariables'); "
                        class="w-full bg-blanco text-lg lg:text-2xl font-bold border-2 lg:border-4 hover:border-2 border-danger rounded-xl text-danger hover:text-blanco  hover:bg-danger hover:border-blanco py-4"
                    >
                        CERRAR
                    </button>

                    <button
                        class="w-full bg-principal text-lg lg:text-2xl font-bold border-principal border-2 lg:border-4 rounded-xl text-blanco hover:text-principal hover:bg-blanco hover:border-principal py-4" :class="{ 'hover:cursor-not-allowed' : activar}" x-bind:disabled="activar"
                        wire:click="guardarItem" wire:loading.attr="disabled" wire:loading.class="bg-medioClaro  hover:bg-medioClaro cursor-not-allowed"
                    >
                        LISTO
                    </button>

                </div>
            </div>
        </div>
    </div>

</div>
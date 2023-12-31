<div>

    <div class="flex flex-col items-center pt-12 pb-6">
        <p class="text-2xl text-oscuro">ASITENTE DE</p>
        <p class="text-2xl text-oscuro font-bold">CREACIÓN DE COTIZACIÓN</p>
    </div>

    <div x-data="{ step1: false, open1: @entangle('open1'), icon1: @entangle('icon1'), high1: 'h-[580px]', value1 : 580,
                     step2: false, open2: @entangle('open2'), icon2: @entangle('icon2'),
                     step3: false,
                     step4: false }"
        x-init="changeHigh"
                     >

        {{-- PRIMER BOTON --}}
        <button @click="calcular1; changeHigh;"
            class="bg-blanco w-full p-4 rounded-t-3xl border-principal border-b-4 grid grid-cols-12 gap-4 shadow-md shadow-sombra"
        >

            <p class="col-span-1 text-[3.5rem] font-semibold text-oscuro">1</p>
            <div class="col-span-10 flex flex-col items-start justify-center my-auto">
                <p class="text-2xl text-oscuro font-semibold">Seleccionar Cliente</p>
                <p class="text-lg text-oscuro">La empresa a la cual se le emitirá  la cotización</p>
            </div>
            <div class="col-span-1 h-full flex items-center justify-center">
                <i class="ri-checkbox-circle-line text-success text-4xl" :class="{ 'hidden': !icon1 }"></i>
                <i class="ri-checkbox-blank-circle-line text-medioClaro text-4xl" :class="{ 'hidden': icon1 }"></i>
            </div>
        </button>

        <div
            x-data="{ inputValue: 500 , showDiv: false}"
            class="bg-blanco rounded-b-3xl mb-4 overflow-hidden shadow-md shadow-sombra transition-all duration-500 ease-in-out"
            :class="high1"
            >

            <div class="w-full flex flex-col p-4" id="div1">
                <button class="bg-principal font-semibold text-blanco text-lg rounded-full p-4 w-full mx-auto hover:ring-2 hover:ring-principal hover:text-principal hover:bg-blanco" @click="open1=true">
                    SELECCIONAR ID CLIENTE
                </button>

                <div class="border-2 border-medioClaro py-4 text-xl font-bold mt-4 rounded-t-3xl text-oscuro text-center">
                    Resumen cliente seleccionado
                </div>
                <div x-data="{datos: @entangle('datosClientes') }"
                    class="font-semibold text-oscuro rounded-b-3xl h-full p-4 w-full mx-auto mb-0 border-2 border-medioClaro"
                >
                    <div>
                        <p class="text-md font-light">Nombre o Razón Social</p>
                        <p class="text-xl" x-text="datos.name"></p>
                    </div>

                    <div class="mt-4">
                        <p class="text-md font-light">Rut</p>
                        <p class="text-xl" x-text="datos.rut"></p>
                    </div>

                    <div class="mt-4">
                        <p class="text-md font-light">Giro o Actividad</p>
                        <p class="text-xl" x-text="datos.giro"></p>
                    </div>

                    <div class="mt-4">
                        <p class="text-md font-light">Email</p>
                        <p class="text-xl" x-text="datos.email"></p>
                    </div>
                    <div class="mt-4">
                        <p class="text-md font-light">Teléfono</p>
                        <p class="text-xl" x-text="datos.phone"></p>
                    </div>
                    <div class="mt-4">
                        <p class="text-md font-light">Sitio web</p>
                        <p class="text-xl" x-text="datos.web"></p>
                    </div>
                    <div class="mt-4">
                        <p class="text-md font-light">Dirección</p>
                        <p class="text-xl" x-text="datos.address"></p>
                    </div>
                    <div class="mt-4">
                        <p class="text-md font-light">Ciudad</p>
                        <p class="text-xl" x-text="datos.city"></p>
                    </div>
                    <div class="mt-4 mb-2">
                        <p class="text-md font-light">Horario de Atención</p>
                        <p class="text-xl" x-text="datos.horario"></p>
                    </div>
                </div>
            </div>

        </div>

        {{-- modal --}}
        <div
            x-on:keydown.escape.window="open1 = false"
            x-show="open1"
            class="jetstream-modal fixed top-32 inset-0 overflow-y-auto px-4 py-6 sm:px-0 z-50"
            style="display: none;"
            >
            <div x-show="open1" class="fixed inset-0 transform transition-all " x-on:click="open1 = false" x-transition:enter="ease-out duration-300"
                            x-transition:enter-start="opacity-0"
                            x-transition:enter-end="opacity-100"
                            x-transition:leave="ease-in duration-200"
                            x-transition:leave-start="opacity-100"
                            x-transition:leave-end="opacity-0">
                <div class="absolute inset-0 bg-oscuro opacity-75"></div>
            </div>

            <div x-show="open1" class="mb-6 bg-blanco rounded-3xl shadow-xl transform transition-all w-10/12 min-w-[480px] max-w-[1920px] mx-auto"
                            x-trap.inert.noscroll="show"
                            x-transition:enter="ease-out duration-300"
                            x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                            x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                            x-transition:leave="ease-in duration-200"
                            x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                            x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            >
                <div class="bg-blanco w-full py-2 rounded-t-3xl border-principal border-b-4 grid grid-cols-12 gap-4 px-6 lg:px-12"
                >
                    <p class="col-span-1 text-[3.5rem] font-semibold text-oscuro text-start">1</p>
                    <div class="col-span-10 flex flex-col items-center justify-center my-auto">
                        <p class="text-2xl text-oscuro font-semibold">Seleccionar ID Cliente</p>
                    </div>
                    <div class="col-span-1 h-full flex items-center justify-end">
                        <i class="ri-user-2-line text-principal text-4xl"></i>
                    </div>
                </div>

                <div class="bg-blanco w-full p-4 px-6 lg:px-12 rounded-b-3xl  ">
                    <div x-data="{cliente_id: @entangle('cliente_id'),  inputValue: (this.cliente_id == undefined ? '' : this.cliente_id ) , isFocused: false,  clientes: @entangle('clientes2') , isShow: true , select: function() { this.clienteId = this.inputValue}}" @click.away = "isFocused = false">

                        <input
                        wire:model='cliente_id'
                        class="rounded-lg focus:ring-medio focus:border-medio focus:ring-1 focus:border-1 px-4 hidden"
                        x-model="inputValue == undefined ? '': inputValue"
                        type="text"
                        >
                        <input
                            class="rounded-lg bg-claro border-0 ring-2 ring-principal  focus:ring-principal focus:border-principal focus:ring-2 focus:border-1 px-4"
                            x-model="inputValue == undefined ? '': inputValue"
                            type="text"
                            placeholder="Buscar cliente por nombre o id"
                            @click="isShow = true ; isFocused = !isFocused"
                            @keydown="isShow = false; cliente_id = inputValue"
                        >

                        <div class="relative w-full -ml-12 ">
                            <div class="absolute inset-full -top-9 pl-3 flex items-center pointer-events-none">
                                <!-- Agrega tu ícono aquí -->
                                <i class="ri-arrow-down-s-line text-oscuro text-2xl top-0"></i>
                            </div>
                        </div>
                        @error($cliente_id)
                            <p class = 'text-sm text-danger '>{{ $message }}</p>
                        @enderror

                        <div class="relative  mt-2">

                            <div x-show="isFocused" class="absolute flex flex-col items-start py-4 rounded-2xl border-medio border-2 bg-claro w-full max-h-96 overflow-y-auto scroll-container">


                                <template x-for="cliente in clientes">
                                    <button
                                        x-show="cliente.name.includes(inputValue == undefined ? '' : inputValue) || cliente.id == inputValue"
                                        @focus="isFocused = true"
                                        @blur="isFocused = false"
                                        @click="inputValue = cliente.id ; isFocused = false; select(); cliente_id = inputValue; calcular1"
                                        x-text="'id: '+cliente.id +' - '+'nombre: '+cliente.name"
                                        class="w-full text-start px-6 py-1 hover:bg-medio"
                                    >
                                    </button>
                                </template>
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-4 my-4">
                            <button @click="open1= false ; if(inputValue != '') {icon1 = true; console.log('true')} else {icon1 = false ; console.log('false') } "
                                class="w-full bg-blanco text-lg lg:text-2xl font-bold border-2 lg:border-4 hover:border-2 border-danger rounded-xl text-danger hover:text-blanco  hover:bg-danger hover:border-blanco py-4"
                            >
                                CERRAR
                            </button>

                            {{-- @click="cliente_id=inputValue; open1= false ; if(inputValue != '') {icon1 = true; console.log('true')} else {icon1 = false ; console.log('false') }" --}}
                            <button
                                
                                class="w-full bg-principal text-lg lg:text-2xl font-bold border-principal border-2 lg:border-4 rounded-xl text-blanco hover:text-principal hover:bg-blanco hover:border-principal py-4"
                                wire:click="guardarCliente" wire:loading.attr="disabled"
                                @click="changeHigh"
                            >
                                LISTO
                            </button>
                        </div>

                    </div>
                </div>


            </div>
        </div>

        <script>
            function calcular1() { 
                
                if(this.high1 == "h-[0px]") {

                    const miDiv = document.getElementById("div1");
                    const number = miDiv.clientHeight;
                    this.value1 = "h-["+number+"px]";
                    this.high1 = this.value1;

                    return;
                }
                this.high1 = "h-[0px]";
            }

            function changeHigh() {

                setTimeout(() => {
                    const miDiv = document.getElementById("div1");
                    const number = miDiv.clientHeight;
                    this.value1 = "h-["+number+"px]";
                    this.high1 = this.value1;
                    //this.value1 = miDiv.clientHeight;
                }, 1000);
            }
        </script>

        {{-- SEGUNDO BOTON --}}
        <button @click="function() {step2=!step2}"
            class="bg-blanco mt-8 w-full p-4 rounded-t-3xl border-principal border-b-4 grid grid-cols-12 gap-4 shadow-md shadow-sombra"
            >
            <p class="col-span-1 text-[3.5rem] font-semibold text-oscuro">2</p>
            <div class="col-span-10 flex flex-col items-start justify-center my-auto">
                <p class="text-2xl text-oscuro font-semibold">Agregar Producto(s)</p>
                <p class="text-lg text-oscuro">Los productos o servicios a cotizar</p>
            </div>
            <div class="col-span-1 h-full flex items-center justify-center">
                <i class="ri-checkbox-circle-line text-success text-4xl" :class="{ 'hidden': !icon2 }"></i>
                <i class="ri-checkbox-blank-circle-line text-medioClaro text-4xl" :class="{ 'hidden': icon2 }"></i>
            </div>
        </button>

        <div x-show="step2 == true"
            class="bg-blanco rounded-b-3xl mb-4 overflow-hidden shadow-md shadow-sombra"
            x-transition:enter="ease-in duration-500"
            x-transition:enter-start="h-[0rem]"
            x-transition:enter-end="h-[35rem]"
            x-transition:leave="ease-in duration-500"
            x-transition:leave-start="h-[35rem]"
            x-transition:leave-end="h-[0rem]"
            >
            <div class="w-full flex flex-col p-4">
                <button class="bg-principal font-semibold text-blanco text-lg rounded-full p-4 w-full mx-auto hover:ring-2 hover:ring-principal hover:text-principal hover:bg-blanco" @click="open1=true">
                    AGREGAR PRODUCTO
                </button>

                {{-- RESUMEN --}}
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

                        <div class="grid grid-cols-12 bg-blanco font-normal text-oscuro text-md p-4  w-full min-w-[1080px] gap-4">
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
                    </div>

                    <div class="flex flex-row w-full">
                        <div class="border-medioClaro border-b-2 border-r-2 border-t-2 flex flex-col items-end justify-center p-4 w-full">
                            <p class="font-light">Neto</p>
                            <p class="text-xl font-bold">$6.052.635</p>
                        </div>
                        <div class="border-medioClaro border-b-2 border-t-2 flex flex-col items-end justify-center p-4 w-full">
                            <p class="font-light">IVA</p>
                            <p class="text-xl font-bold">$1.150.000</p>
                        </div>
                    </div>

                    <div class="border-medioClaro border-b-2 flex flex-col items-center justify-center p-4 w-full">
                        <p class="font-light">Precio Total Bruto Cotización</p>
                        <p class="text-4xl font-bold">$7.202.635</p>
                    </div>

                    <div class=" flex flex-col items-center justify-center p-4 w-full">
                        <p class="font-light">Precio Final aplicando <span class="font-semibold">Descuento del 10%</span></p>
                        <p class="text-4xl font-bold">$6.482.371</p>
                        <p class="font-light">Ahorro de $720.264</p>
                    </div>

                </div>
            </div>

        </div>


        {{-- modal --}}
        <div
            x-on:keydown.escape.window="open2 = false"
            x-show="open2"
            class="jetstream-modal fixed top-32 inset-0 overflow-y-auto px-4 py-6 sm:px-0 z-50"
            style="display: none;"
            >
            <div x-show="open2" class="fixed inset-0 transform transition-all " x-on:click="open1 = false" x-transition:enter="ease-out duration-300"
                            x-transition:enter-start="opacity-0"
                            x-transition:enter-end="opacity-100"
                            x-transition:leave="ease-in duration-200"
                            x-transition:leave-start="opacity-100"
                            x-transition:leave-end="opacity-0">
                <div class="absolute inset-0 bg-oscuro opacity-75"></div>
            </div>

            <div x-show="open2" class="mb-6 bg-blanco rounded-3xl shadow-xl transform transition-all w-10/12 min-w-[480px] max-w-[1920px] mx-auto"
                            x-trap.inert.noscroll="show"
                            x-transition:enter="ease-out duration-300"
                            x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                            x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                            x-transition:leave="ease-in duration-200"
                            x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                            x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            >
                <div class="bg-blanco w-full py-2 rounded-t-3xl border-principal border-b-4 grid grid-cols-12 gap-4 px-6 lg:px-12"
                >
                    <p class="col-span-1 text-[3.5rem] font-semibold text-oscuro text-start">1</p>
                    <div class="col-span-10 flex flex-col items-center justify-center my-auto">
                        <p class="text-2xl text-oscuro font-semibold">Seleccionar ID Cliente</p>
                    </div>
                    <div class="col-span-1 h-full flex items-center justify-end">
                        <i class="ri-user-2-line text-principal text-4xl"></i>
                    </div>
                </div>

                <div class="bg-blanco w-full p-4 px-6 lg:px-12 rounded-b-3xl  ">
                    <div x-data="{cliente_id: @entangle('cliente_id'),  inputValue: (this.cliente_id == undefined ? '' : this.cliente_id ) , isFocused: false,  clientes: @entangle('clientes2') , isShow: true , select: function() { this.clienteId = this.inputValue}}" @click.away = "isFocused = false">

                        <input
                        wire:model='cliente_id'
                        class="rounded-lg focus:ring-medio focus:border-medio focus:ring-1 focus:border-1 px-4 hidden"
                        x-model="inputValue == undefined ? '': inputValue"
                        type="text"
                        >
                        <input
                            class="rounded-lg bg-claro border-0 ring-2 ring-principal  focus:ring-principal focus:border-principal focus:ring-2 focus:border-1 px-4"
                            x-model="inputValue == undefined ? '': inputValue"
                            type="text"
                            placeholder="Buscar cliente por nombre o id"
                            @click="isShow = true ; isFocused = !isFocused"
                            @keydown="isShow = false; cliente_id = inputValue"
                        >

                        <div class="relative w-full -ml-12 ">
                            <div class="absolute inset-full -top-9 pl-3 flex items-center pointer-events-none">
                                <!-- Agrega tu ícono aquí -->
                                <i class="ri-arrow-down-s-line text-oscuro text-2xl top-0"></i>
                            </div>
                        </div>
                        @error($cliente_id)
                            <p class = 'text-sm text-danger '>{{ $message }}</p>
                        @enderror

                        <div class="relative  mt-2">

                            <div x-show="isFocused" class="absolute flex flex-col items-start py-4 rounded-2xl border-medio border-2 bg-claro w-full max-h-96 overflow-y-auto scroll-container">


                                <template x-for="cliente in clientes">
                                    <button
                                        x-show="cliente.name.includes(inputValue == undefined ? '' : inputValue) || cliente.id == inputValue"
                                        @focus="isFocused = true"
                                        @blur="isFocused = false"
                                        @click="inputValue = cliente.id ; isFocused = false; cliente_id = inputValue"
                                        x-text="'id: '+cliente.id +' - '+'nombre: '+cliente.name"
                                        class="w-full text-start px-6 py-1 hover:bg-medio"
                                    >
                                    </button>
                                </template>
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-4 my-4">
                            <button @click="open1= false ; if(inputValue != '') {icon1 = true; console.log('true')} else {icon1 = false ; console.log('false') } "
                                class="w-full bg-blanco text-lg lg:text-2xl font-bold border-2 lg:border-4 hover:border-2 border-danger rounded-xl text-danger hover:text-blanco  hover:bg-danger hover:border-blanco py-4"
                            >
                                CERRAR
                            </button>
                            {{-- @click="cliente_id=inputValue; open1= false ; if(inputValue != '') {icon1 = true; console.log('true')} else {icon1 = false ; console.log('false') }" --}}
                            <button
                                class="w-full bg-principal text-lg lg:text-2xl font-bold border-principal border-2 lg:border-4 rounded-xl text-blanco hover:text-principal hover:bg-blanco hover:border-principal py-4"
                                wire:click="guardarCliente" wire:loading.attr="disabled"
                            >
                                LISTO
                            </button>
                        </div>

                    </div>
                </div>


            </div>
        </div>

    </div>
    
        <div x-data="{ step: @entangle('step') }">

        <div x-show="step === 1" class="card rounded-[20px]">
            <div class="card-body bg-slate-700 rounded-[20px]">

                <div class="mb-4">
                    <x-label value="Fecha"/>
                    <x-input type="date" wire:model="fecha" class="w-full bg-white" />

                    <x-input-error for="fecha"/>
                </div>

                {{-- <div class="mb-4 ">
                    <x-label value="Clientes"/>
                    <select wire:model="cliente_id" class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">

                        <option value="null" selected>--Seleccione un Cliente--</option>
                        @foreach ($clientes as $cliente)
                            <option value="{{$cliente->id}}"><strong>ID</strong>: {{$cliente->id}} -- <strong>NOMBRE</strong>: {{$cliente->name}}</option>
                        @endforeach
                    </select>
                    <x-input-error for="cliente_id"/>
                </div> --}}

                {{-- @livewire('select', ['clientes' => $clientes, 'cliente_id' => $cliente_id], key('selectClientes')) --}}

                {{-- <x-select for="cliente_id" clientes="clientes2" cliente_id="cliente_id"/> --}}

                <div class="mb-4 ">
                    <x-label value="Descuento"/>
                    <x-input type="number" wire:model="descuento" placeholder="valor descuento" class="w-full bg-white text-left" />
                    <x-input-error for="descuento"/>
                </div>

                <div class="mb-4">
                    <x-label  value="Estado"/>
                    <x-input class="form-radio text-indigo-600" type="radio" name="opcion" value="1"  wire:model.defer="status"/> <span class="text-gray-200">publicar</span>
                    <x-input class="form-radio text-indigo-600 ml-4" type="radio" name="opcion" value="2" wire:model.defer="status"/> <span class="text-gray-200">no publicar</span>

                    <x-input-error for="status"/>
                </div>

                <hr class="bg-white mb-4 w-full">

                <div class="flex justify-between w-full">
                    <div class="flex justify-between">

                        <span class="spinner border-4 border-solid w-8 h-8 rounded-full border-t-4 border-blue-500 border-l-transparent animate-spin mr-4" wire:loading wire:target="save"></span>

                        <x-secondary-button wire:click="create" wire:loading.attr="disabled" wire:loading.class="bg-blue-100" wire:target="save" class="disabled:opacity-25">Guardar</x-secondary-button>
                    </div>
                </div>

            </div>
        </div> 

        <div  x-show="step === 2"class="card rounded-[20px]">
            <div class="card-body bg-slate-700 rounded-[20px]">

                {{-- DATOS --}}
                <h2 class="text-gray-200 my-3 text-xl">Datos empresa</h2>
                <x-danger-button wire:click="$set('openDatos', true)">
                    Seleccionar Datos
                </x-danger-button>

                <x-dialog-modal wire:model="openDatos" class="text-black bg-black">
                    <x-slot name="title" >
                        <span class="text-black">Datos Empresa</span>
                    </x-slot>

                    <x-slot name="content" >
                        <div class="bg-gray-500 rounded-xl p-4">
                            <div class="mb-4 ">
                                <x-label value="Plantillas"/>
                                <select wire:init="inicializarValores" wire:model="datosEmpresa_id" class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                                    <option value="nulo">-- <strong>SELECCIONE PLANTILLA</strong> --</option>
                                    @foreach ($datosEmpresas as $datosEmpresa)
                                            <option value="{{$datosEmpresa['id']}}"><strong>ID</strong>: {{$datosEmpresa['id']}} -- <strong>NOMBRE</strong>: {{$datosEmpresa['name']}} --</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </x-slot >

                    <x-slot name="footer" >
                        <div class="flex justify-between w-full">
                            <div class="">
                                <x-danger-button wire:click="$set('openDatos', false)" >Cerrar</x-danger-button>
                            </div>

                            <div class="flex justify-between">

                                <span class="spinner border-4 border-solid w-8 h-8 rounded-full border-t-4 border-blue-500 border-l-transparent animate-spin mr-4" wire:loading wire:target="datosEmpresa"></span>

                                <x-secondary-button wire:click="datosEmpresa" wire:loading.attr="disabled" wire:loading.class="bg-blue-100" wire:target="datosEmpresa" class="disabled:opacity-25">Guardar</x-secondary-button>
                            </div>
                        </div>
                    </x-slot>
                </x-dialog-modal>

                {{-- Mostrar Datos --}}
                <div class="text-white text-lg">
                    <hr class="bg-white my-3">
                    nombre: {{(isset($datosEmpresa_id) && is_numeric($datosEmpresa_id)) ? $datosEmpresas[$datosEmpresa_id-1]['name'] : ''}} <br>
                    dirección: {{(isset($datosEmpresa_id) && is_numeric($datosEmpresa_id)) ? $datosEmpresas[$datosEmpresa_id-1]['address'] : ''}} <br>
                    ciudad: {{(isset($datosEmpresa_id) && is_numeric($datosEmpresa_id)) ? $datosEmpresas[$datosEmpresa_id-1]['city'] : ''}} <br>
                    sitio web: {{(isset($datosEmpresa_id) && is_numeric($datosEmpresa_id)) ? $datosEmpresas[$datosEmpresa_id-1]['website'] : ''}} <br>
                    teléfono: {{(isset($datosEmpresa_id) && is_numeric($datosEmpresa_id)) ? $datosEmpresas[$datosEmpresa_id-1]['phone'] : ''}} <br>
                    horario: {{(isset($datosEmpresa_id) && is_numeric($datosEmpresa_id)) ? $datosEmpresas[$datosEmpresa_id-1]['email'] : ''}} <br>
                    horario: {{(isset($datosEmpresa_id) && is_numeric($datosEmpresa_id)) ? $datosEmpresas[$datosEmpresa_id-1]['office_hours'] : ''}} <br>
                    <hr class="bg-white mt-3">
                </div>
                {{-- DATOS FIN --}}

                {{-- ITEMS --}}
                <h2 class="text-gray-200 my-3 text-xl">Lista de Items</h2>
                {{-- boton modal crear--}}
                <x-danger-button wire:click="$set('open', true)">
                    Agregar Item
                </x-danger-button>

                {{-- ventana modal CREAR -- con Livewire --}}
                <x-dialog-modal wire:model="open" class="text-black bg-black">
                    <x-slot name="title" >
                        <span class="text-black"> Item</span>
                    </x-slot>

                    <x-slot name="content" >

                        <div class="bg-gray-500 rounded-xl p-4">

                            <div class="mb-4 ">

                                <x-label value="Productos"/>
                                <select wire:init="inicializarValores" wire:model="code" wire:change="calcular()" class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                                    <option value="">-- <strong>SELECCIONE UN PRODUCTO</strong> --</option>
                                    @foreach ($productos as $producto)
                                            <option value="{{$producto->code}}"><strong>ID</strong>: {{$producto->id}} -- <strong>NOMBRE</strong>: {{$producto->name}} -- <strong>PRECIO</strong>: {{$producto->price}}</option>
                                    @endforeach

                                </select>
                            </div>

                            <div class="mb-4">
                                <x-label value="Codigo"/>
                                {{$code}}

                                <x-input-error for="code"/>
                            </div>

                            <div class="mb-4">
                                <x-label value="Descripcion"/>
                                <x-input type="text" wire:model="name" placeholder="Descripcion" class="w-full text-left" />

                                <x-input-error for="name"/>
                            </div>

                            <div class="mb-4">
                                <x-label value="Largo [metros]"/>
                                <x-input type="number" wire:model="lenght" placeholder="Largo" class="w-full text-left" placeholder="Ingresa un número" wire:change="calcular()" />

                                <x-input-error for="lenght"/>
                            </div>

                            <div class="mb-4">
                                <x-label value="Ancho [metros]"/>
                                <x-input type="number" placeholder="Ancho" wire:model="width" class="w-full text-left" wire:change="calcular()" />

                                <x-input-error for="width"/>
                            </div>

                            <div class="mb-4">
                                <x-label value="Cantidad"/>
                                <x-input type="number" wire:model="quantity" wire:change="calcular()" placeholder="Cantidad" class="w-full text-left" />

                                <x-input-error for="quantity"/>
                            </div>

                            <div class="mb-4">

                                <x-label value="Precio"/>

                                <span class="text-gray-200 text-xl text-bold" wire:init="inicializarValores">{{ $price }}</span>

                            </div>

                        </div>
                    </x-slot >

                    <x-slot name="footer" >

                        <div class="flex justify-between w-full">
                            <div class="">
                                <x-danger-button wire:click="$set('open', false)" >Cerrar</x-danger-button>
                            </div>

                            <div class="flex justify-between">

                                <span class="spinner border-4 border-solid w-8 h-8 rounded-full border-t-4 border-blue-500 border-l-transparent animate-spin mr-4" wire:loading wire:target="createItem"></span>

                                <x-secondary-button wire:click="createItem" wire:loading.attr="disabled" wire:loading.class="bg-blue-100" wire:target="createItem" class="disabled:opacity-25">Guardar</x-secondary-button>
                            </div>
                        </div>

                    </x-slot>

                </x-dialog-modal>

                {{-- ventana modal editar--}}


                <x-dialog-modal wire:model="open_edit" class="text-black bg-black">
                    
                    <x-slot name="title" >
                        <span class="text-black"> Item</span>
                    </x-slot>

                    <x-slot name="content" >

                        <div class="bg-gray-500 rounded-xl p-4">

                            <div class="mb-4 ">

                                <x-label value="Productos"/>
                                <select wire:model="item.code" class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                                    @foreach ($productos as $producto)
                                            <option value="{{$producto->code}}"><strong>ID</strong>: {{$producto->id}} -- <strong>NOMBRE</strong>: {{$producto->name}} -- <strong>PRECIO</strong>: {{$producto->price}}</option>
                                    @endforeach

                                </select>
                            </div>

                            <div class="mb-4">
                                <x-label value="Codigo"/>
                            </div>

                            <div class="mb-4">
                                <x-label value="Descripcion"/>
                                <x-input type="text" wire:model="item.name" placeholder="Descripcion" class="w-full" />

                            </div>

                            <div class="mb-4">
                                <x-label value="Largo [metros]"/>
                                <x-input type="number" wire:model="item.lenght" placeholder="Largo" class="w-full" placeholder="Ingresa un número" />


                            </div>

                            <div class="mb-4">
                                <x-label value="Ancho [metros]"/>
                                <x-input type="number" placeholder="Ancho" wire:model="item.width" class="w-full"  />
                            </div>

                            <div class="mb-4">
                                <x-label value="Cantidad"/>
                                <x-input type="number" wire:model="item.quantity" placeholder="Cantidad" class="w-full" />
                            </div>

                            <div class="mb-4">

                                <x-label value="Precio"/>

                            </div>

                        </div>
                    </x-slot >

                    <x-slot name="footer" >

                        <div class="flex justify-between w-full">
                            <div class="">
                                <x-danger-button wire:click="$set('open_edit', false)" >Cerrar</x-danger-button>
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
                                wire:target="save"
                                >
                                </span>

                                <x-secondary-button wire:click="update" wire:loading.attr="disabled" wire:loading.class="bg-blue-100" wire:target="save" class="disabled:opacity-25">Guardar</x-secondary-button>
                            </div>
                        </div>



                    </x-slot>

                </x-dialog-modal>


                <div class="m-3"></div>

                {{-- lista item  --}}
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg rounded-xl border border-gray-300 bg-gray-100">
                    <table class="w-full text-sm text-left text-gray-100 dark:text-gray-100 border-none">
                        <thead class="text-xs text-gray-100 uppercase bg-gray-50 dark:bg-gray-500 dark:text-gray-100 border-none">
                            <tr>
                                <th scope="col" class="px-6 py-3 border-none">
                                    Codigo
                                </th>
                                <th scope="col" class="px-6 py-3 border-none">
                                    Descripcion
                                </th>
                                <th scope="col" class="px-6 py-3 border-none">
                                    Cantidad
                                </th>
                                <th scope="col" class="px-6 py-3 border-none">
                                    Precio
                                </th>
                                <th scope="col" class="px-6 py-3 border-none">
                                    Acciones
                                </th>
                            </tr>
                        </thead>
                        <tbody >
                            @if($items->count())
                                @foreach ($items as $item)
                                    <tr class="bg-white border-b dark:bg-gray-100 dark:border-gray-100">
                                        <th class="px-6 py-4 font-medium text-gray-900 whitespace-nowra border-r-0 border-l-0">
                                            {{ $item->code }}
                                        </th>
                                        <td class="px-6 py-4 border-r-0 border-l-0">
                                            {{ $item->name }}
                                        </td>
                                        <td class="px-6 py-4 border-r-0 border-l-0">
                                            {{ $item->quantity}}
                                        </td>
                                        <td class="px-6 py-4 border-r-0 border-l-0">
                                            {{ $item->price}}
                                        </td>
                                        <td class="px-6 py-4 border-r-0 border-l-0">

                                            <div class="flex">
                                                @livewire('admin.bills.edit-item', ['item' => $item], key('item'.$item->id))

                                                <a class="btn btn-danger btn-sm mr-4" wire:click="delete({{$item}})">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </div>

                                        </td>

                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
                {{-- ITEMS FIN --}}

                <hr class="bg-white mt-3">

                {{-- DETALLES --}}
                <h2 class="text-gray-200 my-3 text-xl">Detalles y Terminos</h2>
                <div class="w-full bg-gray-800 p-4 rounded-xl">
                    <h2 class="text-gray-200 mb-3 text-lg">Agregar nuevos Detalles o Terminos</h2>
                    <x-danger-button wire:click="$set('openDetalles', true)">
                        Agregar Nuevo
                    </x-danger-button>
                </div>


                {{-- Modal crear detalle o termino --}}
                <x-dialog-modal wire:model="openDetalles" class="text-black bg-black">
                    <x-slot name="title" >
                        <span class="text-black">Detalles o Terminos</span>
                    </x-slot>

                    <x-slot name="content" >
                        <div class="bg-gray-500 rounded-xl p-4">
                            <div class="mb-4 ">
                                <x-label value="descripción"/>
                                <textarea wire:model="DTDescription" class="w-full rounded-xl text-gray-700"></textarea>
                                <x-input-error for="DTDescription"/>
                            </div>

                            <div class="mb-4">
                                <x-label  value="Detalle o Termino"/>
                                <x-input class="form-radio text-indigo-600" type="radio" name="opcion" value="1"  wire:model.defer="DTStatus"/> <span class="text-gray-200">Detalle</span>
                                <x-input class="form-radio text-indigo-600 ml-4" type="radio" name="opcion" value="2" wire:model.defer="DTStatus"/> <span class="text-gray-200">Termino</span>

                                <x-input-error for="DTStatus"/>
                            </div>
                        </div>

                    </x-slot >

                    <x-slot name="footer" >
                        <div class="flex justify-between w-full">
                            <div class="">
                                <x-danger-button wire:click="$set('openDetalles', false)" >Cerrar</x-danger-button>
                            </div>

                            <div class="flex justify-between">

                                <span class="spinner border-4 border-solid w-8 h-8 rounded-full border-t-4 border-blue-500 border-l-transparent animate-spin mr-4" wire:loading wire:target="detallesTerminos"></span>

                                <x-secondary-button wire:click="detallesTerminos" wire:loading.attr="disabled" wire:loading.class="bg-blue-100" wire:target="detallesTerminos" class="disabled:opacity-25">Guardar</x-secondary-button>
                            </div>
                        </div>
                    </x-slot>
                </x-dialog-modal>

                {{-- Modal editar detalle o termino --}}
                <x-dialog-modal wire:model="openDetalles_edit" class="text-black bg-black">
                    <x-slot name="title" >
                        <span class="text-black">Detalles o Terminos</span>
                    </x-slot>

                    <x-slot name="content" >
                        <div class="bg-gray-500 rounded-xl p-4">
                            <div class="mb-4 ">
                                <x-label value="descripción"/>
                                <textarea wire:init="inicializarValores" wire:model="detalle.description" class="w-full rounded-xl text-gray-700"></textarea>
                                <x-input-error for="detalle.description"/>
                            </div>

                            <div class="mb-4">
                                <x-label  value="Detalle o Termino"/>
                                <x-input class="form-radio text-indigo-600" type="radio" name="opcion" value="1"  wire:model.defer="detalle.status"/> <span class="text-gray-200">Detalle</span>
                                <x-input class="form-radio text-indigo-600 ml-4" type="radio" name="opcion" value="2" wire:model.defer="detalle.status"/> <span class="text-gray-200">Termino</span>

                                <x-input-error for="detalle.description"/>
                            </div>
                        </div>

                    </x-slot >

                    <x-slot name="footer" >
                        <div class="flex justify-between w-full">
                            <div class="">
                                <x-danger-button wire:click="$set('openDetalles_edit', false)" >Cerrar</x-danger-button>
                            </div>

                            <div class="flex justify-between">

                                <span class="spinner border-4 border-solid w-8 h-8 rounded-full border-t-4 border-blue-500 border-l-transparent animate-spin mr-4" wire:loading wire:target="updateDetalles"></span>

                                <x-secondary-button wire:click="updateDetalles({{$detalle}})" wire:loading.attr="disabled" wire:loading.class="bg-blue-100" wire:target="updateDetalles" class="disabled:opacity-25">Guardar</x-secondary-button>
                            </div>
                        </div>
                    </x-slot>
                </x-dialog-modal>
                {{-- lista Detalles --}}

                <h2 class="text-gray-200 my-3 text-lg">Seleccionar detalles</h2>
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg rounded-xl border border-gray-300 bg-gray-100 mt-3">
                    <table class="w-full text-sm text-left text-gray-100 dark:text-gray-100 border-none">
                        <thead class="text-xs text-gray-100 uppercase bg-gray-50 dark:bg-gray-500 dark:text-gray-100 border-none">
                            <tr>
                                <th class="px-6 py-3 border-none col-md-10">
                                    Descripcion
                                </th>
                                <th class="px-6 py-3 border-none col-md-2">
                                    Acciones
                                </th>
                            </tr>
                        </thead>
                        <tbody >
                            @if($detalles->count())
                                @foreach ($detalles as $detalle)
                                    @if ($detalle->status == 1)
                                        <tr class="bg-white border-b dark:bg-gray-100 dark:border-gray-100">
                                            <td class="px-6 py-4 border-r-0 border-l-0 text-black">
                                                <input type="checkbox" class="form-checkbox rounded border border-gray-500 text-gray-600" wire:model="isCheckedDetalles" value="{{ $detalle->id }}"> <span class="mr-3"></span>{{ $detalle->description }}
                                            </td>
                                            <td class="px-6 py-4 border-r-0 border-l-0">
                                                <div class="flex">
                                                    @livewire('admin.bills.edit-detalle', ['detalle' => $detalle], key('detalle'.$detalle->id))

                                                    <a class="btn btn-danger btn-sm mr-4" wire:click="deleteDetalles({{$detalle}})">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>

                <hr class="bg-white mt-3">

                {{-- TERMINOS --}}
                <h2 class="text-gray-200 my-3 text-lg">Seleccionar terminos</h2>
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg rounded-xl border border-gray-300 bg-gray-100 mt-3 mb-4">
                    <table class="w-full text-sm text-left text-gray-100 dark:text-gray-100 border-none">
                        <thead class="text-xs text-gray-100 uppercase bg-gray-50 dark:bg-gray-500 dark:text-gray-100 border-none">
                            <tr>
                                <th class="px-6 py-3 border-none col-md-10">
                                    Descripcion
                                </th>
                                <th class="px-6 py-3 border-none col-md-2">
                                    Acciones
                                </th>
                            </tr>
                        </thead>
                        <tbody >
                            @if($detalles->count())
                                @foreach ($terminos as $termino)
                                    @if ($termino->status == 2 )
                                        <tr class="bg-white border-b dark:bg-gray-100 dark:border-gray-100">
                                            <td class="px-6 py-4 border-r-0 border-l-0 text-black">
                                                <input type="checkbox"  class="form-checkbox rounded border border-gray-500 text-gray-600" wire:model="isCheckedTerminos" value="{{ $termino->id }}"> <span class="mr-3"></span> {{ $termino->description }}
                                            </td>
                                            <td class="px-6 py-4 border-r-0 border-l-0">
                                                <div class="flex">

                                                    @livewire('admin.bills.edit-detalle', ['detalle' => $termino], key('termino'.$termino->id))
                                                    <a class="btn btn-danger btn-sm mr-4" wire:click="deleteDetalles({{$termino}})" wire:loading.attr="disabled" wire:target="deleteDetalles">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>

                <hr class="bg-white mt-3 mb-3">

                {{-- BOTON GUARDAR --}}
                <div class="flex justify-between w-full">
                    <div class="flex justify-between">

                        <span class="spinner border-4 border-solid w-8 h-8 rounded-full border-t-4 border-blue-500 border-l-transparent animate-spin mr-4" wire:loading wire:target="save"></span>

                        <x-secondary-button wire:click="save" wire:loading.attr="disabled" wire:loading.class="bg-blue-100" wire:target="save" class="disabled:opacity-25">Guardar</x-secondary-button>
                    </div>
                </div>
                {{-- TERMINOS FIN --}}
            </div>
        </div> 

    </div>

</div>

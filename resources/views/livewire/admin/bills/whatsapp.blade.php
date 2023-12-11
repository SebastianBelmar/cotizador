<div>

    <button class="bg-oscuro text-blanco p-4 rounded-2xl w-full text-base sm:text-xl font-semibold hover:ring hover:ring-oscuro hover:bg-blanco hover:text-oscuro flex justify-center" wire:click="$set('open', true)">
        <span class="hidden lg:flex lg:pr-2">Enviar por</span> Whatsapp <i class="ri-whatsapp-line ml-2"></i>
    </button>

    <x-dialog-modal-cotizacion wire:model="open" class="text-black bg-black">
        <x-slot name="title" >
            <div class="bg-blanco w-full p-6 rounded-t-3xl border-principal border-b-4 grid grid-cols-12 gap-4 px-6 lg:px-12">
                <div class="col-span-1 h-full flex items-center justify-start">
                    <i class="ri-whatsapp-line text-principal text-4xl"></i>
                </div>
                <div class="col-span-10 flex flex-col items-center justify-center my-auto">
                    <p class="text-2xl text-oscuro font-semibold">Enviar Cotizacion</p>
                </div>
            </div>
        </x-slot>

        <x-slot name="content">
            <div class="bg-blanco w-full py-2 rounded-b-3xl px-6">

                <p class="text-lg text-oscuro">Teléfono Destinatario</p>

                <div  x-data="{openInput1: @entangle('openInput1')}">
                    <div @click.away="openInput1 = false">

                        <input
                            class="rounded-lg bg-claro border-0 ring-2 ring-medioClaro  focus:ring-principal focus:border-principal focus:ring-2 focus:border-1 p-4 mt-1 placeholder:text-lg"
                            wire:model='phone'
                            @click="openInput1 = !openInput1"
                            type="text"
                            placeholder="Buscar cliente por nombre o id"
                        >
                        <x-input-error for="productoCantidad"/>
                        <div class="relative w-full -ml-12 ">
                            <div class="absolute inset-full -top-12 pl-3 flex items-center pointer-events-none">
                                <!-- Agrega tu ícono aquí -->
                                <i class="ri-arrow-down-s-line text-oscuro text-2xl top-0"></i>
                            </div>
                        </div>

                        <div class="relative  mt-2">
                            <div x-show="openInput1" class="absolute flex flex-col items-start pb-4 rounded-2xl border-medio border-2 bg-claro max-h-96 overflow-y-auto scroll-container w-full">
                                <div class="w-full min-w-[640px] text-start px-6 py-3 text-base lg:text-lg grid grid-cols-12 gap-4 border-b border-medioClaro bg-oscuro text-blanco">
                                    <p class="col-span-1 text-center">ID</p>
                                    <p class="col-span-3">Nombre</p>
                                    <p class="col-span-5">Email</p>
                                    <p class="col-span-3">Teléfono</p>
                                </div>
                                @foreach ($clientes as $cliente)
                                    <button
                                        class="w-full  min-w-[640px] text-start px-6 py-3 hover:bg-medioClaro text-sm lg:text-lg grid grid-cols-12 border-b border-medioClaro gap-4"
                                        wire:click="guardarInputCliente('{{$cliente->phone}}')"
                                    >
                                        <p class="col-span-1 text-center">{{ $cliente->id}}</p>
                                        <p class="col-span-3">{{ $cliente->name}}</p>
                                        <p class="col-span-5">{{ $cliente->email}}</p>
                                        <p class="col-span-3">{{ $cliente->phone}}</p>
                                    </button>
                                @endforeach
                            </div>
                        </div>

                    </div>
                </div>

                <x-input-error for="phone"/>
            </div>

        </x-slot >

        <x-slot name="footer" >

            <div class="bg-blanco w-full py-2 rounded-b-3xl px-6">
                <div class=" w-full grid grid-cols-2 gap-4 my-6">
                    <button wire:click="$set('open', false)"
                        class="w-full bg-blanco text-lg lg:text-2xl font-semibold border-2 hover:border-2 border-danger rounded-xl text-danger hover:text-blanco  hover:bg-danger py-4"
                    >
                        CERRAR
                    </button>

                    <button
                        class="w-full bg-principal text-lg lg:text-2xl font-semibold border-principal border-2  rounded-xl text-blanco hover:text-principal hover:bg-blanco hover:border-2 hover:border-principal py-4  disabled:opacity-50"
                        wire:click="enviarPdf" wire:loading.attr="disabled" wire:loading.class="bg-claro" wire:target="enviarPdf"
                    >
                        <span class="
                        spinner
                        border-4
                        border-solid
                        w-7
                        h-7
                        rounded-full
                        border-t-4
                        border-oscuro
                        border-l-transparent
                        animate-spin mr-4"

                        wire:loading
                        wire:target="enviarPdf"
                        >
                        </span>

                        <span class="h-10">ENVIAR</span>
                    </button>
                </div>
            </div>



        </x-slot>

    </x-dialog-modal-cotizacion>

</div>

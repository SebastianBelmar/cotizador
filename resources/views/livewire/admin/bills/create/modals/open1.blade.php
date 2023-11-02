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
                    x-trap.inert.noscroll="open1"
                    x-transition:enter="ease-out duration-300"
                    x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                    x-transition:leave="ease-in duration-200"
                    x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                    x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
        >
        <div class="bg-blanco w-full py-2 rounded-t-3xl border-principal border-b-4 grid grid-cols-12 gap-4 px-6 lg:px-12">
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

                @include('livewire.admin.bills.create.inputs.input1')

                <div class="grid grid-cols-2 gap-4 my-4">
                    <button @click="open1= false ; if(inputValue != '') {icon1 = true; console.log('true')} else {icon1 = false ; console.log('false') } "
                        class="w-full bg-blanco text-lg lg:text-2xl font-bold border-2 lg:border-4 hover:border-2 border-danger rounded-xl text-danger hover:text-blanco  hover:bg-danger hover:border-blanco py-4"
                    >
                        CERRAR
                    </button>

                    <button
                        class="w-full bg-principal text-lg lg:text-2xl font-bold border-principal border-2 lg:border-4 rounded-xl text-blanco hover:text-principal hover:bg-blanco hover:border-principal py-4"
                        wire:click="guardarCliente" wire:loading.attr="disabled" wire:loading.class="bg-medioClaro  hover:bg-medioClaro cursor-not-allowed"
                    >
                        LISTO
                    </button>
                </div>

            </div>
        </div>


    </div>
</div>
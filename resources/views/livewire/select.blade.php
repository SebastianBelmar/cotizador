<div>
    <div x-data="{ inputValue: '', isFocused: false,  clientes: @entangle('clientes') , isShow: true , toggleElemento: function() { return this.isFocused = !this.isFocused;  }}" @click.away = "isFocused = false">

        <input wire:model="cliente_id" class="rounded-lg" x-model="inputValue" type="text" placeholder="Escribe o asigna un valor" @focus="isFocused = true" @click="isShow = true; " @keydown="isShow = false">
        <div class="relative w-[95.5%]">
            <div class="absolute inset-full -top-9  pl-3 flex items-center pointer-events-none">
                <!-- Agrega tu ícono aquí -->
                <i class="ri-arrow-down-s-line text-oscuro text-2xl top-0 left-0 "></i>
            </div>
        </div>
        <x-input-error for="cliente_id"/>
        <div class="relative">

            <div x-show="isFocused" class="absolute flex flex-col items-start py-4 rounded-b-2xl bg-medioClaro w-full max-h-96 overflow-y-auto">


                <template x-for="cliente in clientes">
                    <button
                        x-show="cliente.name.includes(inputValue)"
                        @focus="isFocused = true"
                        @blur="isFocused = false"
                        @click="inputValue = cliente.name ; isFocused = false"
                        x-text="cliente.name"
                        class="w-full hover:bg-medio"
                    >
                    </button>
                </template>
            </div>
        </div>

    </div>

    {{-- <x-select for="cliente_id" clientes="clientes"/> --}}
</div>

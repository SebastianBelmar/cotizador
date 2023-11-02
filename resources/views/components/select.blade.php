
@props(['for', 'clientes', 'cliente_id'])



<div>
    <div x-data="{cliente_id: @entangle($cliente_id),  inputValue: this.cliente_id , isFocused: false,  clientes: @entangle($clientes) , isShow: true , select: function() { this.clienteId = this.inputValue}}" @click.away = "isFocused = false">

        <input
            class="rounded-lg focus:ring-medio focus:border-medio focus:ring-1 focus:border-1 px-4"
            x-model="inputValue == undefined ? '': inputValue"
            type="text"
            placeholder="Buscar cliente por nombre o id"
            @click="isShow = true ; isFocused = !isFocused"
            @keydown="isShow = false"
        >

        <div class="relative w-full -ml-12 ">
            <div class="absolute inset-full -top-9 pl-3 flex items-center pointer-events-none">
                <!-- Agrega tu ícono aquí -->
                <i class="ri-arrow-down-s-line text-oscuro text-2xl top-0"></i>
            </div>
        </div>
        @error($for)
            <p class = 'text-sm text-danger '>{{ $message }}</p>
        @enderror

        <div class="relative  mt-2">

            <div x-show="isFocused" class="absolute flex flex-col items-start py-4 rounded-2xl border-medio border-2 bg-claro w-full max-h-96 overflow-y-auto scroll-container">


                <template x-for="cliente in clientes">
                    <button
                        x-show="cliente.name.includes(inputValue == undefined ? '' : inputValue) || cliente.id == inputValue"
                        @focus="isFocused = true"
                        @blur="isFocused = false"
                        @click="inputValue = cliente.id ; isFocused = false; select()"
                        x-text="'id: '+cliente.id +' - '+'nombre: '+cliente.name"
                        class="w-full text-start px-6 py-1 hover:bg-medio"
                    >
                    </button>
                </template>
            </div>
        </div>
    </div>
</div>

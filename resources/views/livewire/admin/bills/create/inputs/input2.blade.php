<input
    wire:model='producto_id'
    name="producto"
    class="hidden"
    x-model="inputValue2.id == undefined ? '': inputValue2.id"
    type="text"
>

<input
    class="rounded-lg bg-claro border-0 ring-2 ring-medioClaro  focus:ring-principal focus:border-principal focus:ring-2 focus:border-1 p-4 mt-4 placeholder:text-lg"
    x-model="selected"
    type="text"
    placeholder="Buscar producto por nombre o código"
    @click="isShow = true ; isFocused2 = !isFocused2"
    @input="isShow = false"
>

<div class="relative w-full -ml-12 ">
<div class="absolute inset-full -top-12 pl-3 flex items-center pointer-events-none">
    <!-- Agrega tu ícono aquí -->
    <i class="ri-arrow-down-s-line text-oscuro text-2xl top-0"></i>
</div>
</div>

<div class="relative  mt-2">

    <div x-show="isFocused2" class="absolute flex flex-col items-start pb-4 rounded-2xl border-medio border-2 bg-claro w-full max-h-96 overflow-y-auto scroll-container">

        <div class="w-full text-start px-6 py-3 text-lg grid grid-cols-6 gap-4 border-b border-medioClaro  bg-oscuro text-blanco">
            <p class="col-span-2 text-center">Código</p>
            <p class="col-span-2">Nombre</p>
            <p class="col-span-2">Precio</p>
        </div>
        <template x-for="producto in productos">
            <button
                x-show="producto.name.includes(selected == undefined ? '' : selected) || buscar(producto.code, selected)"
                @focus="isFocused2 = true"
                @blur="isFocused2 = false"
                @click="inputValue2 = producto ; isFocused2 = false; producto_id = inputValue2.id; selectProduct = producto; activar = false; selected = producto.name"

                class="w-full text-start px-6 py-3 hover:bg-medioClaro text-lg grid grid-cols-6 border-b border-medioClaro gap-4"
            >
                <p class="col-span-2 text-center" x-text='producto.code'></p>
                <p class="col-span-2" x-text='producto.name'></p>
                <p class="col-span-2" x-text='producto.price'></p>
            </button>
        </template>
    </div>
</div>

<script>
        

    function buscar(palabraNumero, inputValue) {
        const palabraBuscada = inputValue.toString();

        const palabraString = palabraNumero.toString();

        if (palabraString.includes(palabraBuscada)){
            return true;
        } else {
            return false;
        }

    }


</script>
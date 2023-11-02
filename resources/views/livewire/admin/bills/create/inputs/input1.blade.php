<input
wire:model='cliente_id'
name='cliente_id'
class="rounded-lg focus:ring-medio focus:border-medio focus:ring-1 focus:border-1 px-4 hidden"
x-model="inputValue == undefined ? '': inputValue"
type="text"
>
@if($errors->has('cliente_id'))
    @foreach ($errors->get('cliente_id') as $error)
            <p class = 'text-sm text-danger'>{{ $error }}</p>
    @endforeach
@endif
<input
class="rounded-lg bg-claro border-0 ring-2 ring-principal  focus:ring-principal focus:border-principal focus:ring-2 focus:border-1 px-4"
x-model="inputValue == undefined ? '': inputValue"
type="text"
name='cliente_id'
placeholder="Buscar cliente por nombre o id"
@click="isShow = true ; isFocused = !isFocused"
@input="isShow = false; cliente_id = inputValue"
>
<div class="relative w-full -ml-12 ">
<div class="absolute inset-full -top-9 pl-3 flex items-center pointer-events-none">
    <!-- Agrega tu ícono aquí -->
    <i class="ri-arrow-down-s-line text-oscuro text-2xl top-0"></i>
</div>
</div>


<div class="relative  mt-2">

<div x-show="isFocused" class="absolute flex flex-col items-start py-4 rounded-2xl border-medio border-2 bg-claro w-full max-h-96 overflow-y-auto scroll-container">


    <template x-for="cliente in clientes">
        <button
            x-show="cliente.name.includes(inputValue == undefined ? '' : inputValue) || cliente.id == inputValue"
            @focus="isFocused = true"
            @blur="isFocused = false"
            @click="inputValue = cliente.id ; isFocused = false; cliente_id = inputValue;"
            x-text="'id: '+cliente.id +' - '+'nombre: '+cliente.name"
            class="w-full text-start px-6 py-1 hover:bg-medio"
        >
        </button>
    </template>
</div>
</div>

<div @click.away="openInput1 = false">
    <input
        class="rounded-lg bg-claro border-0 ring-2 ring-medioClaro  focus:ring-principal focus:border-principal focus:ring-2 focus:border-1 p-4 mt-1 placeholder:text-lg"
        wire:model='cliente_id'
        @focus="openInput1 = true"
        type="text"
        placeholder="Buscar cliente por nombre o id"
    >

    <div class="relative w-full -ml-12 ">
        <div class="absolute inset-full -top-12 pl-3 flex items-center pointer-events-none">
            <!-- Agrega tu ícono aquí -->
            <i class="ri-arrow-down-s-line text-oscuro text-2xl top-0"></i>
        </div>
    </div>

    <div class="relative  mt-2">
        <div x-show="openInput1" class="absolute flex flex-col items-start pb-4 rounded-2xl border-medio border-2 bg-claro w-full max-h-96 overflow-y-auto scroll-container">
            <div class="w-full text-start px-6 py-3 text-lg grid grid-cols-6 gap-4 border-b border-medioClaro  bg-oscuro text-blanco">
                <p class="col-span-2 text-center">ID</p>
                <p class="col-span-2">Nombre</p>
            </div>
            @foreach ($clientes as $cliente)
                <button
                    class="w-full text-start px-6 py-3 hover:bg-medioClaro text-lg grid grid-cols-6 border-b border-medioClaro gap-4"
                    wire:click="guardarInputCliente({{$cliente->id}})"
                >
                    <p class="col-span-2 text-center">{{ $cliente->id}}</p>
                    <p class="col-span-2">{{ $cliente->name}}</p>
                </button>
            @endforeach
        </div>
    </div>
</div>
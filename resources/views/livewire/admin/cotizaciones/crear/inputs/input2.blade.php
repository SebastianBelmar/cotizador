<div @click.away="openInput2 = false">
    <input
        class="rounded-lg bg-claro border-0 ring-2 ring-medioClaro  focus:ring-principal focus:border-principal focus:ring-2 focus:border-1 p-4 mt-1 placeholder:text-lg"
        wire:model='codigo'
        @focus="openInput2 = true"
        type="text"
        placeholder="Buscar Producto por Nombre o Código"
    >
    <div class="relative w-full -ml-12 ">
        <div class="absolute inset-full -top-12 pl-3 flex items-center pointer-events-none">
            <!-- Agrega tu ícono aquí -->
            <i class="ri-arrow-down-s-line text-oscuro text-2xl top-0"></i>
        </div>
    </div>

    <div class="relative mt-2">
        <div x-show="openInput2" class="absolute flex flex-col items-start pb-4 rounded-2xl border-medio border-2 bg-claro w-full max-h-96 overflow-y-auto scroll-container">
            <div class="w-full text-start px-4 sm:px-6 py-3 text-lg grid grid-cols-12 gap-4 border-b border-medioClaro  bg-oscuro text-blanco">
                <p class="col-span-3 "><span class="sm:hidden text-center w-full">Cód.</span> <span class="hidden sm:flex text-center w-full">Código</span></p>
                <p class="col-span-6">Nombre</p>
                <p class="col-span-3">Precio</p>
            </div>
            @foreach ($productos as $producto)
                <button
                    class="w-full text-start px-4 sm:px-6 py-3 hover:bg-medioClaro text-lg grid grid-cols-12 border-b border-medioClaro gap-4"
                    wire:click="guardarInputProducto({{$producto->code}})"
                >
                    <p class="col-span-3 text-start">{{ $producto->code}}</p>
                    <p class="col-span-6">{{ $producto->name}}</p>
                    <p class="col-span-3">${{ number_format($producto->price, 0, ',', '.') }}</p>
                </button>
            @endforeach
        </div>
    </div>
</div>
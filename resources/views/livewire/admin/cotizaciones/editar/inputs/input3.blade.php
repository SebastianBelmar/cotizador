<div @click.away="openInput3 = false">
    <input
        class="rounded-lg bg-claro border-0 ring-2 ring-medioClaro  focus:ring-principal focus:border-principal focus:ring-2 focus:border-1 p-4 mt-1 placeholder:text-xl placeholder:font-normal "
        wire:model='descripcion'
        @click="openInput3 = !openInput3"
        type="text"
        placeholder="Buscar detalles ya creados"
    >
    <div class="relative w-full -ml-12 ">
        <div class="absolute inset-full -top-12 pl-3 flex items-center pointer-events-none">
            <!-- Agrega tu ícono aquí -->
            <i class="ri-arrow-down-s-line text-oscuro text-2xl top-0"></i>
        </div>
    </div>

    <div class="relative  mt-2 ">
        <div x-show="openInput3" class="absolute flex flex-col items-start pb-4 rounded-2xl border-medio border-2 bg-claro w-full max-h-96 overflow-y-auto scroll-container">
            <div class="w-full text-start px-6 py-3 items-center justify-center text-sm sm:text-lg grid grid-cols-6 gap-4 border-b border-medioClaro  bg-oscuro text-blanco">
                <p class="col-span-4 ">Descripción</p>
                <p class="col-span-2 text-center">Seleccionar</p>
            </div>
            @foreach ($detallesGenerales as $detalles)
                <div
                    class="w-full text-start justify-start items-start px-6 py-3 hover:bg-medioClaro text-sm sm:text-lg grid grid-cols-6 border-b border-medioClaro gap-4 font-normal"
                >
                    <div class="col-span-4 hidden lg:flex" x-data="{ mostrar: true }">
                        @php 
                            if (strlen( $detalles->description) > 50) {
                                $textoTruncado = substr( $detalles->description , 0, 50) . '...';
                            } else {
                                $textoTruncado =  $detalles->description;
                            }
                        @endphp

                        <button class="w-full text-start" x-show="!mostrar" @click="mostrar = !mostrar">{{  $detalles->description}}</button>
                        <button x-show="mostrar" @click="mostrar = !mostrar" >{{  $textoTruncado }}</button>                       
                    </div>

                    <div class="col-span-4 flex lg:hidden" x-data="{ mostrar: true }">
                        @php 
                            if (strlen( $detalles->description) > 25) {
                                $textoTruncado = substr( $detalles->description, 0, 25) . '...';
                            } else {
                                $textoTruncado =  $detalles->description;
                            }
                        @endphp

                        <button class="w-full text-start" x-show="!mostrar" @click="mostrar = !mostrar">{{  $detalles->description}}</button>
                        <button x-show="mostrar" @click="mostrar = !mostrar" >{{  $textoTruncado }}</button>                       
                    </div>


                    <div class="col-span-2 text-start">
                        <button class="bg-blanco border border-principal rounded-full text-principal p-2 px-4  lg:px-6 font-normal hover:ring-2 hover:ring-principal w-full text-base  md:text-lg"
                        wire:click="guardarInputDetalle({{$detalles->id}})"
                            >
                            <p class="hidden sm:flex">Seleccionar</p>
                            <i class="sm:hidden ri-add-line font-bold"></i>
                        </button>


                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
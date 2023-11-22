<button @click="(high3 == 'h-0') ? high3 = 'h-44' : high3 = 'h-0'"
    class="bg-blanco mt-8 w-full pl-4 pr-6 sm:pr-4 sm:py-3 rounded-t-3xl border-principal border-b-4 grid grid-cols-12 gap-4 shadow-md shadow-sombra"
    >
    <p class="col-span-1 text-[3.5rem] font-semibold text-oscuro">3</p>

    <div class="col-span-10 ml-3 flex flex-col items-start justify-center my-auto">
        <p class="text-lg sm:text-2xl text-oscuro font-semibold">Detalles</p>
        <p class="text-xs sm:text-lg text-oscuro">Datos adicionales relevantes para su cliente</p>
        <x-input-error for="icon3"/>
    </div>

    <div class="col-span-1 h-full flex items-center justify-center">
        <i class="ri-checkbox-circle-line text-success text-4xl" :class="{ 'hidden': !icon3 }"></i>
        <i class="ri-checkbox-blank-circle-line text-medioClaro text-4xl" :class="{ 'hidden': icon3 }"></i>
    </div>
</button>
{{-- FIN BOTON --}}

<div
class="bg-blanco rounded-b-3xl mb-0 overflow-hidden shadow-md shadow-sombra transition-all duration-500 ease-in-out"
:class="high3"
>
    <div class="w-full flex flex-col p-5 sm:p-4">
        <button class="bg-principal mr-4 font-semibold text-blanco text-base sm:text-lg rounded-xl p-4 w-full mx-auto hover:ring-2 hover:ring-principal hover:text-principal hover:bg-claro" wire:click="$set('open3', true)">
            AGREGAR DETALLE
        </button>

        <button 
        class="bg-blanco flex justify-between items-center font-semibold text-principal text-base sm:text-lg rounded-xl p-4 px-4 lg:px-8 w-full mx-auto mt-4 border-2 border-principal hover:ring-1 hover:ring-principal hover:bg-claro "
        @click="ver3= !ver3">
            <p class="w-full text-center text-principal">VER DETALLES SELECCIONADOS</p>
            <i class="ri-file-list-3-line text-2xl font-light text-principal"></i>
        </button>       
    </div>

</div>

{{-- modal --}}
@include("livewire.admin.cotizaciones.crear.modales.open3")


@include("livewire.admin.cotizaciones.crear.modales.nuevo3")

@include("livewire.admin.cotizaciones.crear.modales.ver3")

@include("livewire.admin.cotizaciones.crear.modales.edit3")
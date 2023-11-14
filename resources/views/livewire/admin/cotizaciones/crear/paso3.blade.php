<button @click="(high3 == 'h-0') ? high3 = 'h-24' : high3 = 'h-0'"
    class="bg-blanco mt-8 w-full p-4 py-3 rounded-t-3xl border-principal border-b-4 grid grid-cols-12 gap-4 shadow-md shadow-sombra"
    >
    <p class="col-span-1 text-[3.5rem] font-semibold text-oscuro">3</p>

    <div class="col-span-10 flex flex-col items-start justify-center my-auto">
        <p class="text-2xl text-oscuro font-semibold">Detalles</p>
        <p class="text-lg text-oscuro">Datos adicionales relevantes para su cliente</p>
        <x-input-error for="icon3"/>
    </div>

    <div class="col-span-1 h-full flex items-center justify-center">
        <i class="ri-checkbox-circle-line text-success text-4xl" :class="{ 'hidden': !icon3 }"></i>
        <i class="ri-checkbox-blank-circle-line text-medioClaro text-4xl" :class="{ 'hidden': icon3 }"></i>
    </div>
</button>
{{-- FIN BOTON --}}

<div
class="bg-blanco rounded-b-3xl mb-4 overflow-hidden shadow-md shadow-sombra transition-all duration-500 ease-in-out"
:class="high3"
>

    <div class="w-full flex p-4">
        <button class="bg-principal font-semibold text-blanco mr-4 text-lg rounded-full p-4 w-2/3 lg:w-1/2 mx-auto hover:ring-2 hover:ring-principal hover:text-principal hover:bg-blanco" wire:click="$set('open3', true)">
            AGREGAR DETALLE
        </button>

        <button 
        class="bg-medio font-semibold text-blanco text-lg rounded-full p-4 w-1/3 lg:w-1/2 mx-auto hover:ring-2 hover:ring-medio hover:text-medio hover:bg-blanco"
        @click="ver3 = !ver3">
            VER
        </button>       
    </div>

</div>

{{-- modal --}}
@include("livewire.admin.cotizaciones.crear.modales.open3")


@include("livewire.admin.cotizaciones.crear.modales.nuevo3")

@include("livewire.admin.cotizaciones.crear.modales.ver3")

@include("livewire.admin.cotizaciones.crear.modales.edit3")
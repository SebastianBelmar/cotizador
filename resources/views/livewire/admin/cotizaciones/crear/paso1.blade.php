<button @click="(high1 == 'h-0') ? high1 = 'h-24' : high1 = 'h-0'"
class="bg-blanco w-full p-4 py-3 rounded-t-3xl border-principal border-b-4 grid grid-cols-12 gap-4 shadow-md shadow-sombra"
>
    <p class="col-span-1 text-[3.5rem] font-semibold text-oscuro">1</p>
    <div class="col-span-10 flex flex-col items-start justify-center my-auto">
        <p class="text-2xl text-oscuro font-semibold">Seleccionar Cliente</p>
        <p class="text-lg text-oscuro">La empresa a la cual se le emitirá  la cotización</p>
        <x-input-error for="icon1"/>
    </div>
    <div class="col-span-1 h-full flex items-center justify-center">
        <i class="ri-checkbox-circle-line text-success text-4xl" :class="{ 'hidden': !icon1 }"></i>
        <i class="ri-checkbox-blank-circle-line text-medioClaro text-4xl" :class="{ 'hidden': icon1 }"></i>
    </div>
</button>

<div
class="bg-blanco rounded-b-3xl mb-4 overflow-hidden shadow-md shadow-sombra transition-all duration-500 ease-in-out"
:class="high1"
>

    <div class="w-full flex p-4">
        <button class="bg-principal mr-4 font-semibold text-blanco text-lg rounded-full p-4 w-2/3 lg:w-1/2 mx-auto hover:ring-2 hover:ring-principal hover:text-principal hover:bg-blanco" wire:click="$set('open1', true)">
            SELECCIONAR CLIENTE
        </button>

        <button 
        class="bg-medio  font-semibold text-blanco text-lg rounded-full p-4 w-1/3 lg:w-1/2 mx-auto hover:ring-2 hover:ring-medio hover:text-medio hover:bg-blanco"
        @click="ver1= !ver1">
            VER
        </button>       
    </div>

</div>

{{-- modal --}}
@include("livewire.admin.cotizaciones.crear.modales.open1")

@include("livewire.admin.cotizaciones.crear.modales.ver1")
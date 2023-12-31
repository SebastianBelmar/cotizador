<button @click="(high1 == 'h-0') ? high1 = 'h-44' : high1 = 'h-0'"
class="bg-blanco w-full p-4 py-3 rounded-t-3xl border-principal border-b-4 grid grid-cols-12 gap-4 shadow-md shadow-sombra"
>
    <p class="col-span-1 text-[3.5rem] font-semibold text-oscuro">1</p>
    <div class="col-span-10 ml-3 flex flex-col items-start justify-center my-auto">
        <p class="text-lg sm:text-2xl text-oscuro font-semibold">Seleccionar Cliente</p>
        <p class="text-xs sm:text-lg text-oscuro">La empresa a la cual se le emitirá  la cotización</p>
        <x-input-error for="icon1"/>
        <x-input-error for="cliente_id"/>
    </div>
    <div class="col-span-1 h-full flex items-center justify-center">
        <i class="ri-checkbox-circle-line text-success text-4xl" :class="{ 'hidden': !icon1 }"></i>
        <i class="ri-checkbox-blank-circle-line text-medioClaro text-4xl" :class="{ 'hidden': icon1 }"></i>
    </div>
</button>

<div
class="bg-blanco rounded-b-3xl mb-0 overflow-hidden shadow-md shadow-sombra transition-all duration-500 ease-in-out"
:class="high1"
>

    <div class="w-full flex flex-col p-5 sm:p-4">
        <button class="bg-principal mr-4 font-semibold text-blanco text-base sm:text-lg rounded-xl p-4 w-full mx-auto hover:ring-2 hover:ring-principal hover:text-principal hover:bg-claro" wire:click="$set('open1', true)">
            SELECCIONAR CLIENTE
        </button>

        <button 
        class="bg-blanco flex justify-between items-center font-semibold text-principal text-base sm:text-lg rounded-xl p-4 px-4 lg:px-8 w-full mx-auto mt-4 border-2 border-principal hover:ring-1 hover:ring-principal hover:bg-claro "
        @click="ver1= !ver1">
            <p class="w-full text-center text-principal">VER CLIENTE SELECCIONADO</p>
            <i class="ri-user-2-line text-2xl font-light text-principal"></i>
        </button>       
    </div>

</div>

{{-- modal --}}
@include("livewire.admin.cotizaciones.editar.modales.open1")

@include("livewire.admin.cotizaciones.editar.modales.ver1")
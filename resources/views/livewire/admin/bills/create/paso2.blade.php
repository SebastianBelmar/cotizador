
{{-- BOTON --}}
<button @click="(high2 == 'h-0') ? high2 = 'h-44' : high2 = 'h-0'"
    class="bg-blanco mt-8 w-full p-4 rounded-t-3xl border-principal border-b-4 grid grid-cols-12 gap-4 shadow-md shadow-sombra"
    >
    <p class="col-span-1 text-[3.5rem] font-semibold text-oscuro">2</p>

    <div class="col-span-10 flex flex-col items-start justify-center my-auto">
        <p class="text-2xl text-oscuro font-semibold">Agregar Producto(s)</p>
        <p class="text-lg text-oscuro">Los productos o servicios a cotizar</p>
    </div>

    <div class="col-span-1 h-full flex items-center justify-center">
        <i class="ri-checkbox-circle-line text-success text-4xl" :class="{ 'hidden': !icon2 }"></i>
        <i class="ri-checkbox-blank-circle-line text-medioClaro text-4xl" :class="{ 'hidden': icon2 }"></i>
    </div>
</button>
{{-- FIN BOTON --}}



    

{{-- CUERPO --}}
<div x-data="{item: [], itemServer: @entangle('datosItem'), selected: '', selectProduct: '',selectProductServer: @entangle('selectProductServer'),  itemNombre: @entangle('itemNombre')}">
    <div 
        class="bg-blanco rounded-b-3xl mb-4 overflow-hidden shadow-md shadow-sombra transition-all duration-500 ease-in-out"
        :class="high2"
        >

        <div class="w-full flex flex-col p-4">
            <button class="bg-principal font-semibold text-blanco text-lg rounded-full p-4 w-full mx-auto hover:ring-2 hover:ring-principal hover:text-principal hover:bg-blanco" @click="open2=true; item=itemServer; selectProduct=selectProductServer; selected = itemNombre;">
                AGREGAR PRODUCTO
            </button>

            <button 
                class="bg-medio mt-5 font-semibold text-blanco text-lg rounded-full p-4 w-full mx-auto hover:ring-2 hover:ring-medio hover:text-medio hover:bg-blanco"
                @click="ver2= !ver2">
                VER
            </button>
        </div>
    </div>

    {{-- ver modal  --}}
    @include("livewire.admin.bills.create.modals.ver2")
    {{-- modal --}}
    @include("livewire.admin.bills.create.modals.open2")

    @include("livewire.admin.bills.create.modals.edit2")
</div>
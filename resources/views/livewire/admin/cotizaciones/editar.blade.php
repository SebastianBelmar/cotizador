<div>

    <div class="flex flex-col items-center pt-12 pb-6">
        <p class="text-2xl text-oscuro">ASITENTE DE</p>
        <p class="text-2xl text-oscuro font-bold">EDICIÓN DE COTIZACIÓN</p>
    </div>

    <div x-data="{high1: 'h-0', icon1: @entangle('icon1') , open1: @entangle('open1'), ver1: @entangle('ver1'), clientes: @entangle('clientes').defer, openInput1: @entangle('openInput1')}">

        {{-- PRIMER BOTON --}}
        @include('livewire.admin.cotizaciones.editar.paso1')

    </div>    

    <div x-data="{high2: 'h-0', icon2: @entangle('icon2') , open2: @entangle('open2'), ver2: @entangle('ver2'), openEdit2: @entangle('openEdit2'), productos: @entangle('productos').defer, openInput2: @entangle('openInput2')}">
        {{-- SEGUNDO BOTON --}}
        @include('livewire.admin.cotizaciones.editar.paso2')
    </div>  

    <div x-data="{high3: 'h-0', icon3: @entangle('icon3') , open3: @entangle('open3'), nuevo3: @entangle('nuevo3'), ver3: @entangle('ver3'), openEdit3: @entangle('openEdit3'), openInput3: @entangle('openInput3')}">
        {{-- TERCER BOTON --}}
        @include('livewire.admin.cotizaciones.editar.paso3')
    </div>  

    <div x-data="{high4: 'h-0', icon4: @entangle('icon4') , open4: @entangle('open4'), nuevo4: @entangle('nuevo4'), ver4: @entangle('ver4'), openEdit4: @entangle('openEdit4'), openInput4: @entangle('openInput4')}">
        {{-- TERCER BOTON --}}
        @include('livewire.admin.cotizaciones.editar.paso4')
    </div>  


    <div class="w-full grid grid-flow-col grid-cols-2 gap-4 my-8">
        <a class="col-span-1 w-full text-center text-blanco text-base sm:text-lg lg:text-2xl font-semibold rounded-2xl bg-danger px-2 sm:px-6 p-6 hover:ring-2 hover:ring-danger focus:ring-2 focus:ring-danger hover:bg-blanco hover:text-danger focus:text-danger focus:bg-blanco"
        href="{{ route('admin.bills.index') }}"
        >
            <p>CANCELAR</p>
        </a>

        <button class="col-span-1 w-full text-center text-blanco text-base sm:text-lg lg:text-2xl font-semibold rounded-2xl bg-principal px-2 sm:px-6 p-6 hover:ring-2 hover:ring-principal focus:ring-2 focus:ring-medio hover:bg-blanco hover:text-principal focus:text-medio focus:bg-blanco" wire:click="crearCotizacion">GUARDAR CAMBIOS</button>
    </div>


</div>
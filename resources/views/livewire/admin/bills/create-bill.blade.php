<div>

    <div class="flex flex-col items-center pt-12 pb-6">
        <p class="text-2xl text-oscuro">ASITENTE DE</p>
        <p class="text-2xl text-oscuro font-bold">CREACIÓN DE COTIZACIÓN</p>
    </div>

    <div x-data="{ step1: false, open1: @entangle('open1') , ver1: @entangle('ver1'), icon1: @entangle('icon1'), high1: 'h-44', value1 : 580,
                     step2: false, open2: @entangle('open2'), open2edit: @entangle('open2edit'), ver2: @entangle('ver2'), icon2: @entangle('icon2'), high2: 'h-44', value2 : 580, datosProducto: @entangle('datosProducto'),
                     step3: false,
                     step4: false }"
                     >


        {{-- PRIMER BOTON --}}

        @include('livewire.admin.bills.create.paso1')

        {{-- SEGUNDO BOTON --}}

        @include('livewire.admin.bills.create.paso2')


    </div>    

</div>

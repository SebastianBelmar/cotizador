<x-dialog-modal-cotizacion wire:model="ver1">

    <x-slot name="title" >
        <div class="border-2 border-medioClaro py-4 text-xl font-bold mt-4 rounded-t-3xl text-oscuro text-center">
            Resumen cliente seleccionado
        </div>
    </x-slot>

    <x-slot name="content" >
        <div x-data="{datos: @entangle('datosClientes') }"
            class="font-semibold text-oscuro rounded-b-3xl h-full p-4 w-full mx-auto mb-0 border-2 border-medioClaro"
            >
            <div>
                <p class="text-md font-light">Nombre o Razón Social</p>
                <p class="text-xl" x-text="datos.name"></p>
            </div>

            <div class="mt-4">
                <p class="text-md font-light">Rut</p>
                <p class="text-xl" x-text="datos.rut"></p>
            </div>

            <div class="mt-4">
                <p class="text-md font-light">Giro o Actividad</p>
                <p class="text-xl" x-text="datos.giro"></p>
            </div>

            <div class="mt-4">
                <p class="text-md font-light">Email</p>
                <p class="text-xl" x-text="datos.email"></p>
            </div>
            <div class="mt-4">
                <p class="text-md font-light">Teléfono</p>
                <p class="text-xl" x-text="datos.phone"></p>
            </div>
            <div class="mt-4">
                <p class="text-md font-light">Sitio web</p>
                <p class="text-xl" x-text="datos.web"></p>
            </div>
            <div class="mt-4">
                <p class="text-md font-light">Dirección</p>
                <p class="text-xl" x-text="datos.address"></p>
            </div>
            <div class="mt-4">
                <p class="text-md font-light">Ciudad</p>
                <p class="text-xl" x-text="datos.city"></p>
            </div>
            <div class="mt-4 mb-2">
                <p class="text-md font-light">Horario de Atención</p>
                <p class="text-xl" x-text="datos.horario"></p>
            </div>
        </div>
    </x-slot>

    <x-slot name="footer">
    </x-slot>
</x-dialog-modal-cotizacion>
<div
    x-on:keydown.escape.window="ver1 = false"
    x-show="ver1"
    class="jetstream-modal fixed top-8 inset-0 overflow-y-auto px-4 py-6 sm:px-0 z-50"
    style="display: none;"
    >
    <div x-show="ver1" class="fixed inset-0 transform transition-all " x-on:click="ver1 = false" x-transition:enter="ease-out duration-300"
                    x-transition:enter-start="opacity-0"
                    x-transition:enter-end="opacity-100"
                    x-transition:leave="ease-in duration-200"
                    x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0">
        <div class="absolute inset-0 bg-oscuro opacity-75"></div>
    </div>

    <div x-show="ver1" class="mb-6 bg-blanco rounded-3xl shadow-xl transform transition-all w-10/12 min-w-[480px] max-w-[1920px] mx-auto"
                    x-trap.inert.noscroll="ver1"
                    x-transition:enter="ease-out duration-300"
                    x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                    x-transition:leave="ease-in duration-200"
                    x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                    x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
        >

        <div class="border-2 border-medioClaro py-4 text-xl font-bold mt-4 rounded-t-3xl text-oscuro text-center">
            Resumen cliente seleccionado
        </div>
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

    </div>
</div>
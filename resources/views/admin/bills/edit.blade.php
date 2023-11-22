<x-app-layout>

    <div class="w-full md:w-10/12 p-4 md:min-w-[480px] max-w-[1920px] h-full mx-auto bg-claro mt-2">
        @livewire('admin.cotizaciones.editar', ['bill' => $bill], key($bill->id))
    </div>

    {{-- fondo --}}
    <div class="fixed w-full h-screen bg-claro -top-0 flex -z-50">
    </div>

</x-app-layout>




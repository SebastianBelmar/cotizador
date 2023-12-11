<x-app-layout>

        <div class="w-10/12 min-w-[380px] max-w-[1920px] mx-auto bg-claro mt-2 ">
            <div class=" max-w-[816px]  mx-auto mt-4">
                @if (session('info-danger'))
                <div x-data="{open: true}">
                    <button x-show="open" class="text-blanco bg-danger px-8 py-4 lg:px-4 lg:py-4 rounded-full text-center text-base w-full" @click="open=false;">
                        <strong>{{session('info-danger')}}</strong>
                    </button>
                </div>
            @endif

            @if (session('info-success'))
                <div x-data="{open: true}">
                    <button x-show="open" class="text-blanco bg-success px-8 py-4 lg:px-4 lg:py-4 rounded-full text-center text-base w-full" @click="open=false;">
                        <strong>{{session('info-success')}}</strong>
                    </button>
                </div>
            @endif
        </div>


        <h1 class="mx-auto text-center p-4 text-xl font-semibold text-oscuro">Cotización {{$bill->id}}</h1>
        <div class="scroll-container overflow-x-auto p-4 mb-60">

            <div class="min-w-[816px] max-w-[816px] bg-blanco rounded-2xl mx-auto shadow-md ">
                @include('admin.bills.cotizacion',  ['bill' => $bill, 'items' => $items, 'ruta' => 1])
            </div>
        </div>

        <div class="fixed top-0 left-0 items-center mt-[35vh]  w-full h-full py-12 px-4 flex justify-center pointer-events-none" x-data="{hover: true}">
            <div class="bg-medioClaro rounded-3xl max-w-[816px] p-4 w-full mx-[0%] sm:mx-12 shadow-lg shadow-sombra pointer-events-auto"
                :class="{ 'opacity-80' : hover}"
                    @mouseenter="hover = false"
                    @mouseleave="hover = true"
                >
                <div class="flex">
                    <div class="pr-4 w-1/2">
                        <a href="{{ route('admin.bills.pdf', $bill) }}" target="_blank" class= "bg-oscuro text-blanco p-4 rounded-2xl w-full text-base sm:text-xl font-semibold hover:ring hover:ring-oscuro hover:bg-blanco hover:text-oscuro flex gap-2 justify-center" type="submit">Mostrar <span class="hidden sm:flex">PDF</span></a>
                    </div>

                    <div class="w-1/2">
                        <form method="POST" action="{{ route('cotizacion.pdf.descargar', $bill) }}">
                            @csrf
                            <button class="bg-oscuro text-blanco p-4 rounded-2xl w-full text-base sm:text-xl font-semibold hover:ring hover:ring-oscuro hover:bg-blanco hover:text-oscuro flex gap-2 justify-center" type="submit">Descargar <span class="hidden sm:flex">PDF</span></button>
                        </form>
                    </div>

                </div>
                <div class="flex mt-4">
                    <div class="pr-4 w-1/2">
                        @livewire('admin.bills.show-bill',  ['bill' => $bill], key($bill->id))
                    </div>
                    <div class="w-1/2">
                        @livewire('admin.bills.whatsapp',  ['bill' => $bill], key('whatsapp' . $bill->id))
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="fixed w-full h-screen bg-claro -top-0 flex -z-50">
    </div>
</x-app-layout>

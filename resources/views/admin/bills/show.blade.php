<x-app-layout>



    <div class="w-10/12 min-w-[380px] max-w-[1920px] h-[180vh] mx-auto bg-claro mt-2 ">
        
        <h1 class="mx-auto text-center p-4 text-xl font-semibold text-oscuro">Cotización {{$bill->id}}</h1>
        <div class="scroll-container overflow-x-auto py-4">
            
            <div class="min-w-[816px] max-w-[816px] bg-blanco rounded-2xl mx-auto shadow-md ">
                @include('admin.bills.cotizacion',  ['bill' => $bill, 'items' => $items, 'ruta' => 1])
            </div>
        </div>

    
        <div class="fixed top-0 left-0 items-center mt-[35vh]  w-full h-full py-12 px-4 flex justify-center pointer-events-none" x-data="{hover: true}">
            <div class="bg-medioClaro rounded-3xl max-w-[816px] p-4 w-full mx-[0%] sm:mx-12 shadow-lg shadow-sombra pointer-events-auto"
                :class="{ 'opacity-80' : hover}"
                    @mouseenter="hover = false" 
                    @mouseleave="hover = true"
                    @touchstart="isTouched = true" 
                    @touchend="isTouched = false"
                >
                <div class="flex mb-4">
                    <div class="pr-4 w-1/2">
                        <form method="POST" action="{{ route('cotizacion.pdf', $bill) }}">
                            @csrf
                            <button class= "bg-oscuro text-blanco p-4 rounded-2xl w-full text-base sm:text-xl font-semibold hover:ring hover:ring-oscuro hover:bg-blanco hover:text-oscuro flex gap-2 justify-center" type="submit">Mostrar <span class="hidden sm:flex">PDF</span></button>
                        </form>
                    </div>
            
                    <div class="w-1/2">
                        <form method="POST" action="{{ route('cotizacion.pdf.descargar', $bill) }}">
                            @csrf
                            <button class="bg-oscuro text-blanco p-4 rounded-2xl w-full text-base sm:text-xl font-semibold hover:ring hover:ring-oscuro hover:bg-blanco hover:text-oscuro flex gap-2 justify-center" type="submit">Descargar <span class="hidden sm:flex">PDF</span></button>
                        </form>
                    </div>
                    
                </div>

                @livewire('admin.bills.show-bill',  ['bill' => $bill], key($bill->id))

            </div>
        </div>
    </div>

    <div class="fixed w-full h-screen bg-claro -top-0 flex -z-50">
    </div>
</x-app-layout>
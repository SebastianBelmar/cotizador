@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="flex items-center justify-between">
        <div class="flex justify-between flex-1 2xl:hidden">
            @if ($paginator->onFirstPage())
                <span class="relative inline-flex items-center px-6 py-5 text-sm font-medium text-gray-500 bg-white shadow-md shadow-sombra cursor-default leading-5 rounded-l-3xl">
                    <i class="ri-arrow-left-s-line  text-2xl mr-2"></i>
                    Anterior
                </span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" class="relative inline-flex items-center px-6 py-5 text-sm font-medium text-oscuro bg-blanco shadow-md shadow-sombra leading-5 rounded-l-3xl hover:text-medio focus:outline-none focus:ring ring-medioClaro focus:border-medio active:bg-claro active:text-oscuro transition ease-in-out duration-150">
                    <i class="ri-arrow-left-s-line  text-2xl mr-2"></i>
                    Anterior
                </a>
            @endif

            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" class="relative inline-flex items-center px-6 py-5 text-sm font-medium text-oscuro bg-blanco shadow-md shadow-sombra cursor-default leading-5 rounded-r-3xl hover:text-medio focus:outline-none focus:ring ring-medioClaro focus:border-medio active:bg-claro active:text-oscuro transition ease-in-out duration-150">
                    Siguiente
                    <i class="ri-arrow-right-s-line text-2xl ml-2"></i>
                </a>
            @else
                <span class="relative inline-flex items-center px-6 py-5 text-sm font-medium text-oscuro bg-blanco shadow-md shadow-sombra cursor-default leading-5 rounded-r-3xl">
                    Siguiente
                    <i class="ri-arrow-right-s-line text-2xl ml-2"></i>
                </span>
            @endif
        </div>

        @if($paginator->total()/10 <= 9)
            <div class="hidden flex-1 2xl:flex items-center justify-start ">
                <div class="absolute">
                    <p class="text-md text-gray-700 leading-5 grid grid-flow-row grid-row-2 gap-1">
                        <span class="col-span-1">{!! __('Showing') !!}</span>
                        @if ($paginator->firstItem())
                            <span class="font-semibold col-span-1">{{ $paginator->firstItem() }}
                            {!! __('to') !!}
                            {{ $paginator->lastItem() }}</span>
                        @else
                            {{ $paginator->count() }}
                        @endif
                        <span class="font-semibold col-span-2"> {!! __('of') !!} {{ $paginator->total() }} {!! __('results') !!}</span>
                    </p>
                </div>

                <div class="m-auto">
                    <span class="relative z-0 inline-flex  rounded-3xl shadow-md shadow-sombra">
                        {{-- Previous Page Link --}}
                        @if ($paginator->onFirstPage())
                            <span aria-disabled="true" aria-label="{{ __('pagination.previous') }}">
                                <span class="relative inline-flex items-center px-4 h-full text-3xl font-medium text-medio bg-blanco  cursor-default rounded-l-3xl leading-5" aria-hidden="true">
                                    <svg class="w-10 h-10" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                                    </svg>
                                </span>
                            </span>
                        @else
                            <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="relative inline-flex items-center px-4 py-4 text-sm font-medium text-medio bg-blanco   rounded-l-3xl leading-5 hover:text-oscuro focus:z-10 focus:outline-none focus:ring ring-medioClaro focus:border-medioClaro active:bg-claro active:text-oscuro transition ease-in-out duration-150" aria-label="{{ __('pagination.previous') }}">
                                <svg class="w-10 h-10" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                                </svg>
                            </a>
                        @endif

                        {{-- Pagination Elements --}}
                        @foreach ($elements as $element)
                            {{-- "Three Dots" Separator --}}
                            @if (is_string($element))
                                <span aria-disabled="true">
                                    <span class="relative inline-flex items-center px-10 py-8 -ml-px text-sm font-medium text-gray-700 bg-white border border-gray-300 cursor-default leading-5">{{ $element }}</span>
                                </span>
                            @endif

                            {{-- Array Of Links --}}
                            @if (is_array($element))
                                @foreach ($element as $page => $url)
                                    @if ($page == $paginator->currentPage())
                                        <span aria-current="page">
                                            <span class="relative inline-flex items-center px-10 py-6 h-full -ml-px text-xl font-medium text-blanco bg-medio border-l border-medioClaro  cursor-default leading-5">{{ $page }}</span>
                                        </span>
                                    @else
                                        <a href="{{ $url }}" class="relative inline-flex items-center px-10 py-6 -ml-px text-xl font-medium text-medio bg-white border-l-2 border-medioClaro leading-5 hover:text-oscuro focus:z-10 focus:outline-none focus:ring ring-medio focus:border-medio active:bg-blanco active:text-oscuro transition ease-in-out duration-150" aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
                                            {{ $page }}
                                        </a>
                                    @endif
                                @endforeach
                            @endif
                        @endforeach

                        {{-- Next Page Link --}}
                        @if ($paginator->hasMorePages())
                            <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="relative inline-flex items-center px-4 py-4 h-full -ml-px text-sm font-medium text-medio bg-white border-l border-medioClaro rounded-r-3xl leading-5 hover:text-oscuro focus:z-10 focus:outline-none focus:ring ring-medioClaro focus:border-oscuro active:bg-claro active:text-oscuro transition ease-in-out duration-150" aria-label="{{ __('pagination.next') }}">
                                <svg class="w-10 h-10" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                </svg>
                            </a>
                        @else
                            <span aria-disabled="true" aria-label="{{ __('pagination.next') }}">
                                <span class="relative inline-flex items-center px-4 py-4 h-full -ml-px text-sm font-medium text-medio bg-blanco cursor-default rounded-r-3xl leading-5" aria-hidden="true">
                                    <svg class="w-10 h-10" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                    </svg>
                                </span>
                            </span>
                        @endif
                    </span>
                </div>
            </div>
        @else
            <div class="hidden 2xl:flex justify-between flex-1 ">
                @if ($paginator->onFirstPage())
                <span class="relative inline-flex items-center px-6 py-4 text-sm font-medium text-gray-500 bg-white shadow-md shadow-sombra cursor-default leading-5 rounded-l-2xl">
                    <i class="ri-arrow-left-s-line  text-2xl mr-2"></i>
                    Anterior
                </span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" class="relative inline-flex items-center px-6 py-4 text-sm font-medium text-oscuro bg-blanco shadow-md shadow-sombra leading-5 rounded-l-2xl hover:text-medio focus:outline-none focus:ring ring-medioClaro focus:border-medio active:bg-claro active:text-oscuro transition ease-in-out duration-150">
                    <i class="ri-arrow-left-s-line  text-2xl mr-2"></i>
                    Anterior
                </a>
            @endif

            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" class="relative inline-flex items-center px-6 py-4 text-sm font-medium text-oscuro bg-blanco shadow-md shadow-sombra cursor-default leading-5 rounded-r-2xl hover:text-medio focus:outline-none focus:ring ring-medioClaro focus:border-medio active:bg-claro active:text-oscuro transition ease-in-out duration-150">
                    Siguiente
                    <i class="ri-arrow-right-s-line text-2xl ml-2"></i>
                </a>
            @else
                <span class="relative inline-flex items-center px-6 py-4 text-sm font-medium text-oscuro bg-blanco shadow-md shadow-sombra cursor-default leading-5 rounded-l-2xl">
                    Siguiente
                    <i class="ri-arrow-right-s-line text-2xl ml-2"></i>
                </span>
            @endif
            </div>
        @endif
    </nav>
@endif

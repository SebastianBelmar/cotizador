<nav class="bg-blanco rounded-b-xl shadow-md shadow-sombra z-50" x-data="{ open: false }" style="z-index: 10;">
    <div class="mx-auto max-w-7xl px-6 sm:px-6 lg:px-8 z-50">
        <div class=" container relative flex h-20  @auth justify-between @else justify-center @endauth items-center">

            <div class="flex z-40">
                {{-- logotipo --}}
                <a href="/" class="flex flex-shrink-0 z-40">
                    <img class="h-10 w-auto" src="{{ asset('/icon/icon.svg') }}" alt="fipe">
                </a>

                {{-- Menu lg --}}
            </div>
            @auth

            <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0 ">

                {{-- Profile dropdown  --}}
                <div class="relative ml-3 " x-data="{ open: false } ">
                    <div>
                        <button x-on:click="open = true" type="button" class="flex rounded-full" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                            <i class="h-12 w-12 bg-claro text-principal text-[24px] justify-center items-center rounded-full border-principal border-[1px] ri-user-line py-1 "></i>
                        </button>
                    </div>

                    <div x-show="open" x-on:click.away="open = false" class=" absolute right-0 mt-2 w-36 origin-top-right rounded-lg bg-white py-2 shadow-lg border-[1px] border-principal" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                        <a href="{{ route('profile.show') }}" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">Tu Perfil</a>

                        <form method="POST" action="{{ route('logout') }}" x-data>
                            @csrf
                            <button type="submit" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1"
                        id="user-menu-item-2"
                        @click.prevent="$root.submit();"
                        >Cerrar Sesión</button>
                        </form>
                    </div>
                </div>
            </div>
            @endauth
        </div>
</nav>

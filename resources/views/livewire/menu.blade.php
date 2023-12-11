<nav x-data="{ open: false }" x-init="quitarClase()">

    {{-- BARRA SUPERIOR --}}
    <div class="bg-blanco w-full h-20 shadow-md shadow-sombra rounded-2xl flex justify-between items-center px-[8vw] z-50">

        <button @click="open = true">
            <i class="text-4xl text-oscuro ri-menu-line"></i>
        </button>

        {{-- TITULOS BARRA --}}
        <div>
            <div x-data="{ url: window.location.href, palabraBuscada: 'home' }">
                <template x-if="url.includes(palabraBuscada)">
                    <a href="/" class="flex flex-shrink-0 z-40">
                        <img class="h-10 w-auto" src="{{ asset('/icon/icon.svg') }}" alt="fipe">
                    </a>
                </template>
            </div>

            <div x-data="{ url: window.location.href, palabraBuscada: 'bills' }">
                <template x-if="url.includes(palabraBuscada)">
                    <span class="flex items-center">
                        <i x-bind:class="{ 'ri-file-text-line': true }" class=" text-3xl mr-4 text-principal"></i>
                        <p x-text="'Cotizaciones'" class="text-oscuro text-2xl font-medium"></p>
                    </span>
                </template>
            </div>

            <div x-data="{ url: window.location.href, palabraBuscada: 'clientes' }">
                <template x-if="url.includes(palabraBuscada)">
                    <span class="flex items-center">
                        <i x-bind:class="{ 'ri-user-2-line': true }" class=" text-3xl mr-4 text-principal"></i>
                        <p x-text="'Clientes'" class="text-oscuro text-2xl font-medium"></p>
                    </span>
                </template>
            </div>

            <div x-data="{ url: window.location.href, palabraBuscada: 'productos' }">
                <template x-if="url.includes(palabraBuscada)">
                    <span class="flex items-center">
                        <i x-bind:class="{ 'ri-box-3-line': true }" class=" text-3xl mr-4 text-principal"></i>
                        <p x-text="'Productos'" class="text-oscuro text-2xl font-medium"></p>
                    </span>
                </template>
            </div>

            <div x-data="{ url: window.location.href, palabraBuscada: 'users' }">
                <template x-if="url.includes(palabraBuscada)">
                    <span class="flex items-center">
                        <i x-bind:class="{ 'ri-group-line': true }" class=" text-3xl mr-4 text-principal"></i>
                        <p x-text="'Usuarios'" class="text-oscuro text-2xl font-medium"></p>
                    </span>
                </template>
            </div>

            <div x-data="{ url: window.location.href, palabraBuscada: 'roles' }">
                <template x-if="url.includes(palabraBuscada)">
                    <span class="flex items-center">
                        <i x-bind:class="{ 'ri-user-settings-line': true }" class=" text-3xl mr-4 text-principal"></i>
                        <p x-text="'Lista de roles'" class="text-oscuro text-2xl font-medium"></p>
                    </span>
                </template>
            </div>

            <div x-data="{ url: window.location.href, palabraBuscada: 'detalles' }">
                <template x-if="url.includes(palabraBuscada)">
                    <span class="flex items-center">
                        <i x-bind:class="{ 'ri-file-list-3-line': true }" class=" text-3xl mr-4 text-principal"></i>
                        <p x-text="'Lista de detalles'" class="text-oscuro text-2xl font-medium hidden sm:flex"></p>
                        <p x-text="'Detalles'" class="text-oscuro text-2xl font-medium sm:hidden flex"></p>
                    </span>
                </template>
            </div>

            <div x-data="{ url: window.location.href, palabraBuscada: 'terminos' }">
                <template x-if="url.includes(palabraBuscada)">
                    <span class="flex items-center">
                        <i x-bind:class="{ 'ri-shake-hands-line': true }" class=" text-3xl mr-4 text-principal"></i>
                        <p x-text="'Lista de términos'" class="text-oscuro text-2xl font-medium hidden sm:flex"></p>
                        <p x-text="'Términos'" class="text-oscuro text-2xl font-medium sm:hidden flex"></p>
                    </span>
                </template>
            </div>
        </div>

        <div class="relative ml-3" x-data="{ open: false }">
            <div>
                <button x-on:click="open = true" type="button" class="flex rounded-full" id="user-menu-button"
                    aria-expanded="false" aria-haspopup="true">
                    <i class="h-12 w-12 bg-claro text-principal text-[24px] justify-center items-center rounded-full border-principal border-[1px] ri-user-line py-1"></i>
                </button>
            </div>

            <div id="user-menu" x-show="open" x-on:click.away="open = false"
                class="hidden z-40 absolute right-0 mt-2 w-36 origin-top-right rounded-lg bg-white py-2 shadow-lg border-[1px] border-principal"
                role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                <a href="{{ route('profile.show') }}" class="block px-4 py-2 text-sm text-gray-700" role="menuitem"
                    tabindex="-1" id="user-menu-item-0">Tu Perfil</a>

                <form method="POST" action="{{ route('logout') }}" x-data>
                    @csrf
                    <button type="submit" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1"
                        id="user-menu-item-2" @click.prevent="$root.submit();">
                        Cerrar Sesión
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Menú lateral -->

    <div id="menu" class="w-[19.5rem] bg-blanco rounded-r-3xl fixed inset-y-0 z-50 h-[100vh] transform transition-all hidden" x-show="open"
        x-transition:enter="ease-in duration-500"
        x-transition:enter-start="-translate-x-[22rem]"
        x-transition:enter-end="translate-x-0"
        x-transition:leave="ease-in duration-500"
        x-transition:leave-start="translate-x-0"
        x-transition:leave-end="-translate-x-[25rem]"
    >

        <div class="relative transform transition-all -z-10" x-show="open"
            x-transition:enter="ease-in duration-500"
            x-transition:enter-start="scale-75 opacity-0 skew-y-40"
            x-transition:enter-end="scale-100 opacity-100 origin-center rotate-0 skew-y-0"
            x-transition:leave="ease-in duration-500"
            x-transition:leave-start="scale-100 origin-center rotate-180 skew-y-0"
            x-transition:leave-end="scale-50 origin-center rotate-0 skew-y-40"
            >
            <!-- Botón para cerrar el menú -->
            <button @click="open = false"
                class="absolute top-8 right-[-4rem] text-blanco bg-danger rounded-full w-12 h-12 border-[3px] border-blanco
                hover:bg-blanco hover:border-danger hover:text-danger
                transform transition-all ease-in duration-300 hover:origin-center hover:rotate-180
                ">
                <i class="ri-close-line text-3xl "></i>
            </button>
        </div>

        <div class="grid grid-row-12 rounded-r-3xl w-[19.5rem] bg-blanco h-[100vh] scroll-container overflow-y-auto overflow-x-hidden">
            {{-- logo --}}
            <div class="w-[19.5rem]  row-span-1 h-20 bg-blanco rounded-tr-3xl flex justify-start items-center px-6 border-b-[2px] border-claro">
                <img class="h-10 w-auto " src="{{ asset('/icon/icon.svg') }}" alt="fipe">
            </div>

            <!-- Contenido del menú aquí -->
            <div class="w-80 row-span-6 relative min-h-0 ">
                <div class="flex flex-col items-start pl-6 h-full scroll-container overflow-y-auto">
                    <ul class="mt-0 w-full pr-4">

                        <a href="{{ route('admin.home') }}"
                            class="mb-1 py-3 px-5 text-oscuro hover:rounded-md text-lg font-medium hover:bg-principal hover:text-blanco flex justify-between items-center"
                            x-data="{ isHovered: false }" @mouseenter="isHovered = true" @mouseleave="isHovered = false">
                            <span class="flex items-center">
                                <i :class="isHovered ? 'text-blanco' : 'text-principal'"
                                    class="ri-home-line text-3xl mr-4 "></i>Inicio
                            </span>
                            <i :class="isHovered ? 'text-blanco' : 'text-medioClaro'"
                                class="ri-arrow-right-up-line text-3xl"></i>
                        </a>

                        @can('admin.bills.index')
                            <a href="{{ route('admin.bills.index') }}"
                                class="mb-1 py-3 px-5 text-oscuro hover:rounded-md text-lg font-medium hover:bg-principal hover:text-blanco flex justify-between items-center"
                                x-data="{ isHovered: false }" @mouseenter="isHovered = true" @mouseleave="isHovered = false">
                                <span class="flex items-center">
                                    <i :class="isHovered ? 'text-blanco' : 'text-principal'"
                                        class="ri-file-text-line text-3xl mr-4 "></i>Cotizaciones
                                </span>
                                <i :class="isHovered ? 'text-blanco' : 'text-medioClaro'"
                                    class="ri-arrow-right-up-line text-3xl"></i>
                            </a>
                        @endcan

                        @can('admin.clientes.index')
                            <a href="{{ route('admin.clientes.index') }}"
                                class="mb-1 py-3 px-5 text-oscuro hover:rounded-md text-lg font-medium hover:bg-principal hover:text-blanco flex justify-between items-center"
                                x-data="{ isHovered: false }" @mouseenter="isHovered = true" @mouseleave="isHovered = false">
                                <span class="flex items-center">
                                    <i :class="isHovered ? 'text-blanco' : 'text-principal'"
                                        class="ri-user-2-line text-3xl mr-4 "></i>Clientes
                                </span>
                                <i :class="isHovered ? 'text-blanco' : 'text-medioClaro'"
                                    class="ri-arrow-right-up-line text-3xl"></i>
                            </a>
                        @endcan
                    </ul>
                    {{-- ADMINISTRADOR --}}
                    @can('admin.productos.index')
                    <p class="text-medioClaro text-2xl mt-6 mb-4 font-bold"><i class="ri-admin-line mr-4"></i>ADMINISTRADOR</p>
                    @elsecan('admin.users.index')
                    <p class="text-medioClaro text-2xl mt-6 mb-4 font-bold"><i class="ri-admin-line mr-4"></i>ADMINISTRADOR</p>
                    @elsecan('admin.roles.index')
                    <p class="text-medioClaro text-2xl mt-6 mb-4 font-bold"><i class="ri-admin-line mr-4"></i>ADMINISTRADOR</p>
                    @elsecan('admin.datos-empresas.edit')
                    <p class="text-medioClaro text-2xl mt-6 mb-4 font-bold"><i class="ri-admin-line mr-4"></i>ADMINISTRADOR</p>
                    @elsecan('admin.detalles.index')
                    <p class="text-medioClaro text-2xl mt-6 mb-4 font-bold"><i class="ri-admin-line mr-4"></i>ADMINISTRADOR</p>
                    @elsecan('admin.terminos.index')
                    <p class="text-medioClaro text-2xl mt-6 mb-4 font-bold"><i class="ri-admin-line mr-4"></i>ADMINISTRADOR</p>
                    @else
                        <div class="h-80"></div>
                    @endcan
                    <ul class="pb-0 w-full pr-4 flex flex-col justify-between">

                        @can('admin.productos.index')
                            <a href="{{ route('admin.productos.index') }}"
                                class="mb-1 py-3 px-5 text-oscuro hover:rounded-md text-lg font-medium hover:bg-principal hover:text-blanco flex justify-between items-center"
                                x-data="{ isHovered: false }" @mouseenter="isHovered = true" @mouseleave="isHovered = false">
                                <span class="flex items-center">
                                    <i :class="isHovered ? 'text-blanco' : 'text-principal'"
                                        class="ri-box-3-line text-3xl mr-4 "></i>Productos
                                </span>
                                <i :class="isHovered ? 'text-blanco' : 'text-medioClaro'"
                                    class="ri-arrow-right-up-line text-3xl"></i>
                            </a>
                        @endcan

                        @can('admin.detalles.index')
                        <a href="{{  route('admin.detalles') }}"
                            class="mb-1 py-3 px-5 text-oscuro hover:rounded-md text-lg font-medium hover:bg-principal hover:text-blanco flex justify-between items-center"
                            x-data="{ isHovered: false }" @mouseenter="isHovered = true" @mouseleave="isHovered = false">
                            <span class="flex items-center">
                                <i :class="isHovered ? 'text-blanco' : 'text-principal'"
                                    class="ri-file-list-3-line text-3xl mr-4 "></i>
                                    Detalles
                            </span>
                            <i :class="isHovered ? 'text-blanco' : 'text-medioClaro'"
                                class="ri-arrow-right-up-line text-3xl"></i>
                        </a>
                        @endcan

                        @can('admin.terminos.index')
                        <a href="{{  route('admin.terminos') }}"
                            class="mb-1 py-3 px-5 text-oscuro hover:rounded-md text-lg font-medium hover:bg-principal hover:text-blanco flex justify-between items-center"
                            x-data="{ isHovered: false }" @mouseenter="isHovered = true" @mouseleave="isHovered = false">
                            <span class="flex items-center">
                                <i :class="isHovered ? 'text-blanco' : 'text-principal'"
                                    class="ri-shake-hands-line text-3xl mr-4 "></i>
                                    Términos
                            </span>
                            <i :class="isHovered ? 'text-blanco' : 'text-medioClaro'"
                                class="ri-arrow-right-up-line text-3xl"></i>
                        </a>
                        @endcan

                        @can('admin.datos-empresas.edit')
                        <a href="{{  route('admin.datos-empresas.edit', 1) }}"
                            class="mb-1 py-3 px-5 text-oscuro hover:rounded-md text-lg font-medium hover:bg-principal hover:text-blanco flex justify-between items-center"
                            x-data="{ isHovered: false }" @mouseenter="isHovered = true" @mouseleave="isHovered = false">
                            <span class="flex items-center">
                                <i :class="isHovered ? 'text-blanco' : 'text-principal'"
                                    class="ri-building-line text-3xl mr-4 "></i>
                                    Datos Empresas
                            </span>
                            <i :class="isHovered ? 'text-blanco' : 'text-medioClaro'"
                                class="ri-arrow-right-up-line text-3xl"></i>
                        </a>
                        @endcan
                        @can('admin.users.index')
                            <a href="{{ route('admin.users.index') }}"
                                class="mb-1 py-3 px-5 text-oscuro hover:rounded-md text-lg font-medium hover:bg-principal hover:text-blanco flex justify-between items-center"
                                x-data="{ isHovered: false }" @mouseenter="isHovered = true" @mouseleave="isHovered = false">
                                <span class="flex items-center">
                                    <i :class="isHovered ? 'text-blanco' : 'text-principal'"
                                        class="ri-group-line text-3xl mr-4 "></i>Usuarios
                                </span>
                                <i :class="isHovered ? 'text-blanco' : 'text-medioClaro'"
                                    class="ri-arrow-right-up-line text-3xl"></i>
                            </a>
                        @endcan

                        @can('admin.roles.index')
                            <a href="{{ route('admin.roles.index') }}"
                                class="mb-1 py-3 px-5 text-oscuro hover:rounded-md text-lg font-medium hover:bg-principal hover:text-blanco flex justify-between items-center"
                                x-data="{ isHovered: false }" @mouseenter="isHovered = true" @mouseleave="isHovered = false">
                                <span class="flex items-center">
                                    <i :class="isHovered ? 'text-blanco' : 'text-principal'"
                                        class="ri-user-settings-line text-3xl mr-4 "></i>Lista de roles
                                </span>
                                <i :class="isHovered ? 'text-blanco' : 'text-medioClaro'"
                                    class="ri-arrow-right-up-line text-3xl"></i>
                            </a>
                        @endcan
                    </ul>
                </div>
            </div>

            <div class="w-[20.5rem] row-span-1 h-[80px] min-h-[80px] bg-blanco rounded-br-3xl flex justify-start items-center px-6 border-t-[2px] border-claro place-self-end">
                <form method="POST" action="{{ route('logout') }}" class="w-[20.5rem]" x-data="{ isHovered: false }" @mouseenter="isHovered = true" @mouseleave="isHovered = false">
                    @csrf
                    <button
                        type="submit"
                        class="mb-1 w-full py-3 px-5 text-oscuro hover:rounded-md text-lg font-medium hover:bg-danger hover:text-blanco flex justify-between items-center"
                        role="menuitem"
                        tabindex="-1"
                        id="user-menu-item-3"
                        @click.prevent="$root.submit();"
                    >
                        <span class="flex items-center">
                            <i :class="isHovered ? 'text-blanco' : 'text-danger'"
                                class="ri-logout-circle-r-line text-3xl mr-4 "></i>Cerrar Sesión
                        </span>
                        <i :class="isHovered ? 'text-blanco' : 'text-medioClaro'"
                            class="ri-arrow-right-up-line text-3xl"></i>
                        </a>
                    </button>
                </form>
            </div>
        </div>


    </div>

    <!-- Fondo oscuro al hacer clic fuera del menú -->
    <div id="fondo" class="fixed inset-0 z-40 transform transition-all hidden" x-show="open"
        x-transition:enter="ease-in duration-500"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-50"
        x-transition:leave="ease-in duration-500"
        x-transition:leave-start="opacity-50"
        x-transition:leave-end="opacity-0"
    >
        <div class="absolute inset-0 bg-oscuro opacity-50" @click="open=false"></div>
    </div>

    <script>
        function quitarClase() {
            var elemento = document.getElementById('menu');
            var user = document.getElementById('user-menu');
            var fondo = document.getElementById('fondo');

            elemento.classList.remove('hidden');
            user.classList.remove('hidden');
            fondo.classList.remove('hidden');
        }
    </script>

</nav>

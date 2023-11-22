<x-app-layout>

    <div class="w-full sm:w-10/12  sm:min-w-[480px] max-w-[1920px] h-full mx-auto grid grid-cols-2 bg-blanco mt-2">
        <div class=" bg-claro w-full h-full col-span-2 lg:col-span-1">
            <div class="grid grid-rows-3 sm:grid-rows-1 grid-cols-1 sm:grid-cols-2 gap-2 sm:gap-6 w-full py-12 px-4 sm:px-0 lg:pr-16">
                <div class="bg-oscuro w-full h-24 sm:h-36 col-span-2 rounded-3xl flex items-center justify-center px-auto">
                    <p class="text-2xl md:text-4xl lg:text-2xl xl:text-3xl 2xl:text-4xl text-blanco font-bold ">SISTEMA DE COTIZACIÓN</p>
                </div>
                @can('admin.bills.index')
                <a href="{{ route('admin.bills.index') }}"
                    class="bg-blanco w-full mt-4 sm:mt-0 h-20 sm:h-32 md:h-40 lg:h-32 2xl:h-40 col-span-2 sm:col-span-1  rounded-xl sm:rounded-3xl shadow-lg shadow-sombra flex flex-col justify-between p-6 transform ring-principal hover:ring-2 transition-all duration-300 hover:scale-[103%] ease-out pointer-events-auto">

                    <div class="flex sm:hidden justify-between">
                        <i class="ri-file-text-line text-3xl md:text-4xl lg:text-3xl 2xl:text-4xl text-principal"></i>
                        <p class="text-oscuro w-full px-4 font-semibold text-2xl md:text-3xl lg:text-xl xl:text-2xl 2xl:text-4xl">Cotizaciones</p>
                        <i class="ri-arrow-right-up-line text-3xl md:text-4xl lg:text-3xl 2xl:text-4xl text-medioClaro"></i>
                    </div>

                    <div class="hidden sm:flex justify-between">
                        <i class="ri-file-text-line text-3xl md:text-4xl lg:text-3xl 2xl:text-4xl text-principal"></i>
                        <i class="ri-arrow-right-up-line text-3xl md:text-4xl lg:text-3xl 2xl:text-4xl text-medioClaro"></i>
                    </div>
                    <div class="hidden sm:flex justify-start">
                        <p class="text-oscuro font-semibold text-2xl md:text-3xl lg:text-xl xl:text-2xl 2xl:text-4xl">Cotizaciones</p>
                    </div>
                </a>
                @endcan

                @can('admin.clientes.index')
                <a href="{{ route('admin.clientes.index') }}"
                    class="bg-blanco w-full mt-4 sm:mt-0 h-20 sm:h-32 md:h-40 lg:h-32 2xl:h-40 col-span-2 sm:col-span-1 rounded-xl sm:rounded-3xl shadow-lg shadow-sombra flex flex-col justify-between p-6 transform ring-principal hover:ring-2 transition-all duration-300 hover:scale-[103%] ease-out pointer-events-auto">
                    <div class="flex sm:hidden justify-between">
                        <i class="ri-user-2-line text-3xl md:text-4xl lg:text-3xl 2xl:text-4xl text-principal"></i>
                        <p class="text-oscuro w-full px-4 font-semibold text-2xl md:text-3xl lg:text-xl xl:text-2xl 2xl:text-4xl">Clientes</p>
                        <i class="ri-arrow-right-up-line text-3xl md:text-4xl lg:text-3xl 2xl:text-4xl text-medioClaro"></i>
                    </div>

                    <div class="hidden sm:flex justify-between">
                        <i class="ri-user-2-line text-3xl md:text-4xl lg:text-3xl 2xl:text-4xl text-principal"></i>
                        <i class="ri-arrow-right-up-line text-3xl md:text-4xl lg:text-3xl 2xl:text-4xl text-medioClaro"></i>
                    </div>
                    <div class="hidden sm:flex justify-start">
                        <p class="text-oscuro font-semibold text-2xl md:text-3xl lg:text-xl xl:text-2xl 2xl:text-4xl">Clientes</p>
                    </div>
                </a>
                @endcan
            </div>
            @can('admin.productos.index','admin.users.index','admin.roles.index')
            <p class="text-oscuro text-3xl sm:text-4xl sm:mt-8 mb-12 font-bold px-4 sm:px-0 lg:pr-16"><i class="ri-admin-line mr-4"></i>ADMINISTRADOR</p>
            @endcan

            <div class="grid grid-cols-3 gap-6 px-4 sm:px-0 lg:pr-16">
                @can('admin.productos.index')
                <a href="{{ route('admin.productos.index') }}"
                    class="bg-blanco w-full h-20 sm:h-40 md:h-56 lg:h-44 2xl:h-56 col-span-3 sm:col-span-1 rounded-xl sm:rounded-3xl shadow-lg shadow-sombra flex flex-col justify-between p-6 transform ring-principal hover:ring-2 transition-all duration-300 hover:scale-[103%] ease-out pointer-events-auto">
                    <div class="flex sm:hidden justify-between">
                        <i class="ri-box-3-line text-3xl md:text-5xl lg:text-3xl 2xl:text-5xl text-principal"></i>
                        <p class="text-oscuro w-full px-4 font-semibold text-2xl sm:text-3xl lg:text-lg xl:text-2xl 2xl:text-3xl">Productos</p>
                        <i class="ri-arrow-right-up-line text-3xl md:text-4xl lg:text-3xl 2xl:text-4xl text-medioClaro"></i>
                    </div>

                    <div class="hidden sm:flex justify-end">
                        <i class="ri-arrow-right-up-line text-3xl md:text-4xl lg:text-3xl 2xl:text-4xl text-medioClaro"></i>
                    </div>
                    <div class="hidden sm:flex items-center justify-center">
                        <i class="ri-box-3-line text-3xl md:text-5xl lg:text-3xl 2xl:text-5xl text-principal"></i>
                    </div>
                    <div class="hidden sm:flex justify-center">
                        <p class="text-oscuro font-semibold text-xl md:text-3xl lg:text-lg xl:text-2xl 2xl:text-3xl">Productos</p>
                    </div>
                </a>
                @endcan

                @can('admin.detalles.index')
                <a href="{{ route('admin.detalles') }}"
                    class="bg-blanco w-full h-20 sm:h-40 md:h-56 lg:h-44 2xl:h-56 col-span-3 sm:col-span-1 rounded-xl sm:rounded-3xl shadow-lg shadow-sombra flex flex-col justify-between p-6 transform ring-principal hover:ring-2 transition-all duration-300 hover:scale-[103%] ease-out pointer-events-auto">

                    <div class="flex sm:hidden justify-between">
                        <i class="ri-file-list-3-line text-3xl md:text-5xl lg:text-3xl 2xl:text-5xl text-principal"></i>
                        <p class="text-oscuro w-full px-4 font-semibold text-2xl sm:text-3xl lg:text-lg xl:text-2xl 2xl:text-3xl">Detalles</p>
                        <i class="ri-arrow-right-up-line text-3xl md:text-4xl lg:text-3xl 2xl:text-4xl text-medioClaro"></i>
                    </div>

                    <div class="hidden sm:flex justify-end">
                        <i class="ri-arrow-right-up-line text-3xl md:text-4xl lg:text-3xl 2xl:text-4xl text-medioClaro"></i>
                    </div>
                    <div class="hidden sm:flex items-center justify-center">
                        <i class="ri-file-list-3-line text-3xl md:text-5xl lg:text-3xl 2xl:text-5xl text-principal"></i>
                    </div>
                    <div class="hidden sm:flex justify-center">
                        <p class="text-oscuro font-semibold text-xl md:text-3xl lg:text-lg xl:text-2xl 2xl:text-3xl">Detalles</p>
                    </div>
                </a>
                @endcan

                @can('admin.terminos.index')
                <a href="{{ route('admin.terminos') }}"
                    class="bg-blanco w-full mb-12 h-20 sm:h-40 md:h-56 lg:h-44 2xl:h-56 col-span-3 sm:col-span-1 rounded-xl sm:rounded-3xl shadow-lg shadow-sombra flex flex-col justify-between p-6 transform ring-principal hover:ring-2 transition-all duration-300 hover:scale-[103%] ease-out pointer-events-auto">

                    <div class="flex sm:hidden justify-between">
                        <i class="ri-shake-hands-line text-3xl md:text-5xl lg:text-3xl 2xl:text-5xl text-principal"></i>
                        <p class="text-oscuro w-full px-4 font-semibold text-2xl sm:text-3xl lg:text-lg xl:text-2xl 2xl:text-3xl">Términos</p>
                        <i class="ri-arrow-right-up-line text-3xl md:text-4xl lg:text-3xl 2xl:text-4xl text-medioClaro"></i>
                    </div>

                    <div class="hidden sm:flex justify-end">
                        <i class="ri-arrow-right-up-line text-3xl md:text-4xl lg:text-3xl 2xl:text-4xl text-medioClaro"></i>
                    </div>
                    <div class="hidden sm:flex items-center justify-center">
                        <i class="ri-shake-hands-line text-3xl md:text-5xl lg:text-3xl 2xl:text-5xl text-principal"></i>
                    </div>
                    <div class="hidden sm:flex justify-center">
                        <p class="text-oscuro font-semibold text-xl md:text-3xl lg:text-lg xl:text-2xl 2xl:text-3xl">Términos</p>
                    </div>
                </a>
                @endcan
            </div>

            <div class="grid grid-cols-3 gap-6 px-4 sm:px-0 lg:pr-16">
                @can('admin.datos-empresas.edit')
                <a href="{{ route('admin.datos-empresas.edit', 1) }}"
                    class="bg-blanco w-full h-20 sm:h-40 md:h-56 lg:h-44 2xl:h-56 col-span-3 sm:col-span-1 rounded-xl sm:rounded-3xl shadow-lg shadow-sombra flex flex-col justify-between p-6 transform ring-principal hover:ring-2 transition-all duration-300 hover:scale-[103%] ease-out pointer-events-auto">
                    <div class="flex sm:hidden justify-between">
                        <i class="ri-building-line text-3xl md:text-5xl lg:text-3xl 2xl:text-5xl text-principal"></i>
                        <p class="text-oscuro w-full px-4 font-semibold text-2xl sm:text-3xl lg:text-lg xl:text-2xl 2xl:text-3xl">Empresa</p>
                        <i class="ri-arrow-right-up-line text-3xl md:text-4xl lg:text-3xl 2xl:text-4xl text-medioClaro"></i>
                    </div>

                    <div class="hidden sm:flex justify-end">
                        <i class="ri-arrow-right-up-line text-3xl md:text-4xl lg:text-3xl 2xl:text-4xl text-medioClaro"></i>
                    </div>
                    <div class="hidden sm:flex items-center justify-center">
                        <i class="ri-building-line text-3xl md:text-5xl lg:text-3xl 2xl:text-5xl text-principal"></i>
                    </div>
                    <div class="hidden sm:flex justify-center">
                        <p class="text-oscuro font-semibold text-xl md:text-3xl lg:text-lg xl:text-2xl 2xl:text-3xl">Empresa</p>
                    </div>
                </a>
                @endcan

                @can('admin.users.index')
                <a href="{{ route('admin.users.index') }}"
                    class="bg-blanco w-full h-20 sm:h-40 md:h-56 lg:h-44 2xl:h-56 col-span-3 sm:col-span-1 rounded-xl sm:rounded-3xl shadow-lg shadow-sombra flex flex-col justify-between p-6 transform ring-principal hover:ring-2 transition-all duration-300 hover:scale-[103%] ease-out pointer-events-auto">

                    <div class="flex sm:hidden justify-between">
                        <i class="ri-group-line text-3xl md:text-5xl lg:text-3xl 2xl:text-5xl text-principal"></i>
                        <p class="text-oscuro w-full px-4 font-semibold text-2xl sm:text-3xl lg:text-lg xl:text-2xl 2xl:text-3xl">Usuarios</p>
                        <i class="ri-arrow-right-up-line text-3xl md:text-4xl lg:text-3xl 2xl:text-4xl text-medioClaro"></i>
                    </div>

                    <div class="hidden sm:flex justify-end">
                        <i class="ri-arrow-right-up-line text-3xl md:text-4xl lg:text-3xl 2xl:text-4xl text-medioClaro"></i>
                    </div>
                    <div class="hidden sm:flex items-center justify-center">
                        <i class="ri-group-line text-3xl md:text-5xl lg:text-3xl 2xl:text-5xl text-principal"></i>
                    </div>
                    <div class="hidden sm:flex justify-center">
                        <p class="text-oscuro font-semibold text-xl md:text-3xl lg:text-lg xl:text-2xl 2xl:text-3xl">Usuarios</p>
                    </div>
                </a>
                @endcan

                @can('admin.roles.index')
                <a href="{{ route('admin.roles.index') }}"
                    class="bg-blanco w-full mb-12 h-20 sm:h-40 md:h-56 lg:h-44 2xl:h-56 col-span-3 sm:col-span-1 rounded-xl sm:rounded-3xl shadow-lg shadow-sombra flex flex-col justify-between p-6 transform ring-principal hover:ring-2 transition-all duration-300 hover:scale-[103%] ease-out pointer-events-auto">

                    <div class="flex sm:hidden justify-between">
                        <i class="ri-user-settings-line text-3xl md:text-5xl lg:text-3xl 2xl:text-5xl text-principal"></i>
                        <p class="text-oscuro w-full px-4 font-semibold text-2xl sm:text-3xl lg:text-lg xl:text-2xl 2xl:text-3xl">Roles</p>
                        <i class="ri-arrow-right-up-line text-3xl md:text-4xl lg:text-3xl 2xl:text-4xl text-medioClaro"></i>
                    </div>

                    <div class="hidden sm:flex justify-end">
                        <i class="ri-arrow-right-up-line text-3xl md:text-4xl lg:text-3xl 2xl:text-4xl text-medioClaro"></i>
                    </div>
                    <div class="hidden sm:flex items-center justify-center">
                        <i class="ri-user-settings-line text-3xl md:text-5xl lg:text-3xl 2xl:text-5xl text-principal"></i>
                    </div>
                    <div class="hidden sm:flex justify-center">
                        <p class="text-oscuro font-semibold text-xl md:text-3xl lg:text-lg xl:text-2xl 2xl:text-3xl">Roles</p>
                    </div>
                </a>
                @endcan
            </div>
        </div>




        <div class="h-[90vh] w-full  hidden lg:flex justify-center items-center p-2 xl:p-4 2xl:p-12">
            <div x-data="{ lottieAnimation: '/json/animacion2.json' }" x-init="() => {
                lottie.loadAnimation({
                container: $refs.lottieContainer,
                renderer: 'svg',
                loop: true,
                autoplay: true,
                path: lottieAnimation
                });
            }">

                <div x-ref="lottieContainer" class=" mx-auto  bg-blanco rounded-full p-4">
                </div>
            </div>

            <script src="https://cdnjs.cloudflare.com/ajax/libs/lottie-web/5.12.2/lottie.min.js" integrity="sha512-jEnuDt6jfecCjthQAJ+ed0MTVA++5ZKmlUcmDGBv2vUI/REn6FuIdixLNnQT+vKusE2hhTk2is3cFvv5wA+Sgg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        </div>
    </div>

    {{-- fondo --}}
    <div class="fixed w-full h-screen -top-0 flex -z-50">
        <div class="w-full lg:w-1/2 h-screen bg-claro -z-40 order-1">
        </div>
        <div class="w-1/2 hidden  h-screen bg-blanco -z-50 order-2">
        </div>
    </div>


</x-app-layout>

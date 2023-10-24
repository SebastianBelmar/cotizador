<x-guest-layout>

    <div class="md:container mx-auto lg:mx-auto alto z-40" >
        <div class="flex flex-col md:flex-row justify-end z-40">
            @auth
                <div class="fixed top-0 left-0 justify-center items-center w-full h-full md:w-1/2 hidden md:flex bg-blanco rounded-r-[50px] my-1 z-10">
                    <div class="h-full max-w-xl flex flex-col item-center justify-center mx-auto my-auto z-40">
                        <div class="flex mx-auto">
                            <div class="bg-principal w-3 h-6 my-auto rounded-[3px] mr-2"></div><p class=" text-[35px] text-oscuro z-50">SISTEMA DE <span class="font-bold">COTIZACIÓN</span></p>
                        </div>
                    </div>
                </div>
            @else
                <div class="fixed top-0 left-0 justify-center items-center w-full h-full md:w-1/2 hidden md:flex bg-blanco rounded-r-[50px] my-1 z-10">
                    <div class="h-full max-w-xl flex flex-col item-center justify-center mx-auto my-auto z-40">
                        <div class="flex mx-auto">
                            <div class="bg-principal w-3 h-6 my-auto rounded-[3px] mr-2"></div><p class=" text-[35px] text-oscuro z-50">SISTEMA DE <span class="font-bold">COTIZACIÓN</span></p>
                        </div>

                        <div id="lottie"></div>

                        <div x-data="{ lottieAnimation: '/json/animacion.json' }" x-init="() => {
                            lottie.loadAnimation({
                            container: $refs.lottieContainer,
                            renderer: 'svg',
                            loop: true,
                            autoplay: true,
                            path: lottieAnimation
                            });
                        }">
                            <div x-ref="lottieContainer"></div>
                        </div>
                    </div>
                </div>
            @endauth


            <div class="flex justify-center items-center w-full md:w-1/2 alto z-40">
                @auth
                <div class="fixed top-0 left-0 justify-center items-center w-full h-full md:w-1/2 hidden md:flex bg-claro rounded-r-[50px] my-1 z-10">
                    <div class="h-full max-w-xlflex flex-col item-center justify-center mx-auto my-auto z-40">

                    </div>
                </div>

                <div class="flex flex-col w-full lg:w-[600px] justify-center mx-auto my-auto px-4 z-40" >
                    <div class=" w-full h-[80vh] flex flex-col">
                        <div class="bg-blanco w-12/12 h-64 rounded-3xl shadow-md shadow-sombra">
                            <div class="bg-oscuro w-12/12 h-40 rounded-3xl flex flex-col items-start justify-center">
                                <p class="px-10 pb-2 text-3xl md:text-4xl text-blanco">¡Bienvenido al</p>
                                <p class="px-10 text-3xl md:text-4xl text-blanco font-semibold">Sistema de Cotización!</p>
                            </div>
                            <p class="px-10 py-4 text-md md:text-lg text-oscuro">Gestiona tus cotizaciones de manera rápida y sencilla en tu área personal.</p>
                        </div>
                        <a href="{{ route('admin.home') }}" class="md:hidden bg-principal shadow-md shadow-sombra w-full ml-11/12 mt-12 py-6 px-2 text-lg font-semibold text-center rounded-2xl text-blanco hover:bg-blanco hover:ring-2 hover:ring-principal hover:text-principal z-40">GESTIONAR COTIZACIONES <i class="ri-arrow-right-up-line ml-4 text-light text-3xl"></i> </a>

                        <div class="bg-blanco w-12/12  md:h-64 rounded-3xl shadow-md shadow-sombra mt-10">
                            <div class="bg-blanco w-12/12 h-20 rounded-t-3xl border border-b-oscuro border-b-[1px] flex flex-col items-start justify-center">
                                <p class="px-10 pt-4 text-3xl font-semibold text-oscuro">Mi Información</p>
                            </div>
                            <div class="flex flex-col md:flex-row justify-around">
                                <div class=" h-44 md:w-[270px] flex flex-col">
                                    <div class="h-32 w-12/12 mb-1 flex flex-col items-start justify-center">
                                        <p class="pl-10 md:pl-4  text-[14px] text-oscuro font-light flex items-center"><i class="text-lg text-principal ri-user-line pr-1"></i> Usuario</p>
                                        <p class="pl-10 md:pl-4 text-2xl text-oscuro font-semibold">{{ucfirst(auth()->user()->name) }}  {{ucfirst(auth()->user()->last_name) }}</p>
                                    </div>
                                    <div class="h-32 w-12/12 flex flex-col">
                                        <p class="pl-10 md:pl-4  text-[14px] text-oscuro font-light flex items-center"><i class="text-2xl text-principal ri-pass-valid-line pr-2"></i> Rol</p>
                                        <p class="pl-10 md:pl-4 text-2xl text-oscuro font-semibold">
                                            @foreach ( auth()->user()->getRoleNames() as $role)
                                                {{$role}}
                                            @endforeach
                                        </p>

                                    </div>
                                </div>
                                <div class="pb-6 md:pb-0 md:h-44 md:w-[180px] flex flex-row  justify-between md:flex-col">
                                    <div class="md:h-32 w-12/12 mb-1 flex flex-col items-start justify-center">
                                        <p class="pl-10 md:pl-0  text-[14px] text-oscuro font-light flex items-center"><i class="text-lg text-principal ri-links-line pr-1"></i> Estado</p>
                                        <p class="pl-10 md:pl-0 text-2xl text-oscuro font-semibold">Conectado</p>
                                    </div>
                                    <div class="px-10 md:px-0 md:h-32 w-12/12 flex flex-col items-start justify-center">

                                        <form method="POST" action="{{ route('logout') }}" class="w-[35vw] sm:w-[50vw] md:w-[15vw] lg:w-full" x-data>
                                            @csrf
                                                <button type="submit" class="bg-danger hover:ring-1 hover:ring-danger hover:text-danger hover:bg-blanco w-full py-4 px-0 lg:px-0 md:mx-0 rounded-xl text-blanco text-sm" role="menuitem" tabindex="-1"
                                                    @click.prevent="$root.submit();"
                                                >
                                                    Cerrar Sesión
                                                </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-10">
                            <div class="h-1">
                            </div>
                        </div>

                    </div>
                </div>




                @else
                <div class="flex flex-col max-w-[400px] md:w-[600px] justify-center mx-auto my-auto px-4 z-40" >
                    <p class="mx-auto text-[28px] text-oscuro md:hidden mb-4 z-40">SISTEMA DE <span class="font-bold">COTIZACIÓN</span></p>
                    <div class="text-oscuro text-xl text-bold py-4 px-4 mb-4 text-center border-principal border-b-2 rounded-t-2xl bg-blanco shadow-md shadow-sombra z-40"><i class="text-principal ri-user-line mr-3"></i>Control de Acceso</div>
                    <div class="p-6 rounded-2xl z-40 bg-blanco shadow-md shadow-sombra" >
                        <x-validation-errors class="mb-4" />
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div>
                                <x-label for="email" class="text-medio font-2xl" value="{{ __('Email') }}" />
                                <x-input id="email" class="block mt-1 w-full bg-claro" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                            </div>

                            <div class="mt-4">
                                <x-label for="password" class="text-medio" value="{{ __('Password') }}" />
                                <x-input id="password" class="block mt-1 w-full bg-claro" type="password" name="password" required autocomplete="current-password" />
                            </div>

                            <div class="block mt-4">
                                <label for="remember_me" class="flex items-center">
                                    <x-checkbox id="remember_me" name="remember" />
                                    <span class="ml-2 text-sm text-medio ">{{ __('Recuérdame') }}</span>
                                </label>
                            </div>

                            <div class="flex flex-col justify-start mt-4">
                                @if (Route::has('password.request'))
                                    <a class="underline text-sm text-oscuro hover:text-principal rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-principal" href="{{ route('password.request') }}">
                                        {{ __('¿Olvidaste tu contraseña?') }}
                                    </a>
                                    <x-button class="flex justify-center ml-1 mt-4 py-4 bg-principal hover:bg-medio text-lg text-blanco font-bold rounded-xl">
                                        {{ __('Iniciar sesión') }}
                                    </x-button>
                                @endif
                            </div>

                        </form>
                    </div>

                    <div class="h-32">
                    </div>
                </div>

                @endauth
            </div>

        @auth
            <div class="hidden md:flex justify-center items-center w-full md:w-1/2 alto pr-20 z-40">

                <div class="flex flex-col w-[400px] md:w-[500px] mx-auto my-auto px-4 z-40" >

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

                    <a href="{{ route('admin.home') }}" class="bg-principal w-full ml-11/12 mt-12 py-6 px-2 text-lg font-semibold text-center rounded-2xl text-blanco hover:bg-blanco hover:ring-2 hover:ring-principal hover:text-principal z-40">GESTIONAR COTIZACIONES <i class="ri-arrow-right-up-line ml-4 text-light text-3xl"></i> </a>

                    <div class="h-52 w-full"></div>
                </div>

            </div>

        @endauth

        </div>
      </div>


    <div class="fixed top-0 left-0 w-full bg-oscuro h-full bg-cover bg-start bg-no-repeat bg-fixed z-1 hidden md:flex">

        <div class="fixed opacity-25 top-0 left-0 w-full h-full bg-cover bg-start bg-no-repeat bg-fixed blur-sm z-0 hidden md:flex" style="background-image: url('img/fondo.jpg');transform: scale(1.1); ">
            <!-- Contenido dentro del div fijo -->

        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/lottie-web/5.12.2/lottie.min.js" integrity="sha512-jEnuDt6jfecCjthQAJ+ed0MTVA++5ZKmlUcmDGBv2vUI/REn6FuIdixLNnQT+vKusE2hhTk2is3cFvv5wA+Sgg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    </div>

    </x-app-layout>

<x-app-layout>

    <div class="container mx-auto lg:mx-auto">
        <div class="flex flex-col md:flex-row">
            <div class="flex justify-center items-center w-full md:w-1/3 h-screen orden-1 ">

                @auth
                    <div class="flex flex-col justify-center mx-auto my-auto ">
                        <p class="text-gray-200 text-2xl text-bold px-4 ">¡Bienvenido de nuevo a tu Cotizador Personal!</p>
                        <p class="text-gray-400 text-md text-bold p-2 px-4 mb-2">Encuentra todas tus cotizaciones anteriores y gestiona tus productos de manera rápida y sencilla en tu área personal.</p>
                        <a href="{{ route('admin.home') }}" class="bg-indigo-600 w-1/3 mx-4 py-2 text-center rounded-full border border-indigo-800 text-gray-200 hover:bg-indigo-500">Comenzar</a>
                    </div>
                @else
                <div class="flex flex-col justify-center mx-auto my-auto px-4">
                    <p class="text-white text-2xl text-bold p-2 px-4 mb-2 text-center border rounded-lg bg-[#1F2937] border-slate-950">Iniciar sesión</p>
                    <div class="p-12 rounded-lg bg-[#1F2937] border border-slate-950">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                
                            <div>
                                <x-label for="email" value="{{ __('Email') }}" />
                                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                            </div>
                
                            <div class="mt-4">
                                <x-label for="password" value="{{ __('Password') }}" />
                                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                            </div>
                
                            <div class="block mt-4">
                                <label for="remember_me" class="flex items-center">
                                    <x-checkbox id="remember_me" name="remember" />
                                    <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Recuérdame') }}</span>
                                </label>
                            </div>
                
                            <div class="flex items-center justify-end mt-4">
                                @if (Route::has('password.request'))
                                    <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                                        {{ __('¿Olvidaste tu contraseña?') }}
                                    </a>
                                @endif
                
                                <x-button class="ml-1">
                                    {{ __('Iniciar sesión') }}
                                </x-button>
                            </div>
                        </form>
                    </div>
                </div>

                @endauth
            </div>

            <div class="justify-center items-center w-full md:w-2/3 h-screen hidden md:flex bg-slate-700  rounded-xl my-4 order-2">
                <div class="h-96 w-full flex flex-col item-center justify-center mx-auto my-auto">
                    <script src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs" type="module"></script> 

                    <dotlottie-player class="mx-auto" src="https://lottie.host/b79dac3f-15ec-4aef-b8de-5f8a79bd41c7/jFW1AkQyG6.json" background="transparent" speed="1" style="width: 600px; height: 1000px;" loop autoplay></dotlottie-player>
                </div>
            </div>

        </div>
      </div>
      
</x-app-layout>
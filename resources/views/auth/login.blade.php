<x-guest-layout>
    {{-- <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                {{ session('status') }}
            </div>
        @endif

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
                    <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-button class="ml-4">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card> --}}
    <div class="h-[100vh] my-auto">
        <div class="flex flex-col max-w-[400px] md:w-[600px] justify-center mx-auto mt-[25vh] px-4 z-40" >
            <p class="mx-auto text-[28px] text-oscuro mb-4 z-40">SISTEMA DE <span class="font-bold">COTIZACIÓN</span></p>
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
                            <x-button class="flex justify-center ml-1 mt-4 py-4 bg-principal focus:ring focus:ring-principal active:ring active:ring-principal active:text-principal focus:text-principal hover:bg-medio text-lg text-blanco font-bold rounded-xl">
                                {{ __('Iniciar sesión') }}
                            </x-button>
                        @endif
                    </div>
    
                </form>
            </div>
    
            <div class="h-32">
            </div>
        </div>
    </div>


    <div class="fixed w-full h-screen -top-0 flex -z-50">
        <div class="w-full h-screen bg-claro -z-40 order-1">
        </div>
        
    </div>

</x-guest-layout>

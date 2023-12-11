<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title')</title>

        <!-- Fonts -->
        {{-- <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" /> --}}
        <link rel="icon" type="image/x-icon" href="{{ asset('icon/favicon.svg') }}">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&family=Open+Sans:wght@300&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>

    <body class="antialiased">


        <div class="font-pop h-screen bg-claro overflow-y-auto" >

            <div class="fixed top-0 left-0 w-full h-[5rem] z-50">
                @livewire('navigation')
            </div>


            <!-- Page Content  -->
            <main class="mt-[5rem] z-[-100]" style="z-index: -100;">
                <body class="antialiased">
                    <div class="relative flex justify-center min-h-screen items-center sm:pt-0">
                        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
                            <div class="flex items-center pt-8 justify-center sm:pt-0">
                                <div class="px-4 text-lg text-oscuro border-r border-medio tracking-wider">
                                    @yield('code')
                                </div>

                                <div class="ml-4 text-lg text-oscuro uppercase tracking-wider">
                                    @yield('message')
                                </div>
                            </div>
                            <div class="flex items-center pt-8 justify-center w-full">

                                <a href="/" class="flex flex-col flex-shrink-0 justify-center text-sm sm:text-base z-40 w-full text-oscuro hover:text-medio hover:scale-105 transition-all duration-300 ease-out pointer-events-auto">
                                    <p class="w-full pb-4">
                                        Haz clic aquí para volver a la página de inicio.
                                    </p>

                                    <img class="h-10 w-auto" src="{{ asset('/icon/icon.svg') }}" alt="fipe">
                                </a>
                            </div>
                        </div>
                    </div>
                </body>
            </main>
        </div>

        @stack('modals')

        @livewireScripts
    </body>
</html>

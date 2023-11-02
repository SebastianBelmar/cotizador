<x-app-layout>

    {{-- <style>
        #miDiv {
          background-color: lightblue;
        }
      </style>
    </head>
    <body>
      <div id="miDiv" class="hover:p-4">
        Este es un div de ejemplo.
      </div>
    
      <script>
        const divElement = document.querySelector('#miDiv');
        const resizeObserver = new ResizeObserver(entries => {
          for (const entry of entries) {
            const target = entry.target;
            const width = target.offsetWidth;
            const height = target.offsetHeight;
            console.log(`El div cambió de tamaño: Ancho ${width}px, Alto ${height}px`);
          }
        });
    
        resizeObserver.observe(divElement);
      </script> --}}


    <div class="w-10/12 min-w-[480px] max-w-[1920px] h-full mx-auto bg-claro mt-2">
        @livewire('admin.bills.create-bill')
        
    </div>

    {{-- fondo --}}
    <div class="fixed w-full h-screen bg-claro -top-0 flex -z-50">
    </div>
</x-app-layout>


        
    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    {{$slot}}
                </div>
            </div>
        </div>
    </div>

    <div class="container mx-auto mt-5">
        <div class="overflow-x-auto">
          <table class="min-w-full bg-white border rounded-lg">
            <thead class="bg-gray-800 text-white">
              <tr>
                <th class="px-6 py-3 text-left font-semibold w-1/4">Columna 1</th>
                <th class="px-6 py-3 text-left font-semibold w-1/4">Columna 2</th>
                <th class="px-6 py-3 text-left font-semibold w-1/4">Columna 3</th>
                <th class="px-6 py-3 text-left font-semibold w-1/4">Columna 4</th>
              </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
              <!-- Filas de la tabla -->
              <tr>
                <td class="px-6 py-4">Dato 1</td>
                <td class="px-6 py-4">Dato 2</td>
                <td class="px-6 py-4">Dato 3</td>
                <td class="px-6 py-4">Dato 4</td>
              </tr>
              <tr>
                <td class="px-6 py-4">Dato 5</td>
                <td class="px-6 py-4">Dato 6</td>
                <td class="px-6 py-4">Dato 7</td>
                <td class="px-6 py-4">Dato 8</td>
              </tr>
              <!-- Agrega más filas según sea necesario -->
            </tbody>
          </table>
        </div>
      </div>
      
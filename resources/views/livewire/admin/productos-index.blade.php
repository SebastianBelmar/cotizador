<div>

    @if (session('info'))
    <div class="alert alert-danger">
        <strong>{{session('info')}}</strong>
    </div>
    @endif

    <div class="border border-1 rounded-xl mb-3">
        @can('admin.productos.create')
        <div class="bg-gray-200 rounded-t-xl px-4 pt-3 pb-3">
            <a href="{{route('admin.productos.create')}}" class="bg-gray-500 px-4 py-2 rounded-2xl text-gray-100 hover:text-gray-200 hover:bg-gray-600">Agregar Producto</a>
        </div>
        @endcan
        <div class="bg-gray-500 rounded-b-xl px-4 py-2">
            <input wire:model="search" class="rounded-xl focus:border-black focus:ring-1 focus:ring-black " placeholder="Ingrese el nombre de un producto">
        </div>
    </div>


        @if ($productos->count())
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg rounded-xl border border-gray-300 bg-gray-100">
                <table class="w-full text-sm text-left text-gray-100 dark:text-gray-100 border-none">
                    <thead class="text-xs text-gray-100 uppercase bg-gray-50 dark:bg-gray-500 dark:text-gray-100 border-none">
                        <tr>
                            <th scope="col" class="px-6 py-3 border-none">ID</th>
                            <th scope="col" class="px-6 py-3 border-none">Name</th>
                            <th scope="col" class="px-6 py-3 border-none">Precio</th>
                            <th scope="col" class="px-6 py-3 border-none"></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($productos as $producto)
                            <tr class="border-none">
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowra border-r-0 border-l-0">{{$producto->id}}</td>
                                <td class="px-6 py-4 font-medium text-gray-900 border-r-0 border-l-0">{{$producto->name}}</td>
                                <td class="px-6 py-4 font-medium text-gray-900 border-r-0 border-l-0">{{$producto->price}}</td>
                                <td class="px-6 py-4 border-r-0 border-l-0 w-40">
                                    <div class="flex justify-end">
                                        @can('admin.productos.edit')
                                        <a href="{{route('admin.productos.edit', $producto)}}" class="btn btn-primary btn-sm mr-4"><i class="fa fa-edit"></i></a>
                                        @endcan
                                        @can('admin.productos.destroy')
                                        <form action="{{route('admin.productos.destroy', $producto)}}" method="POST">
                                            @csrf
                                            @method('delete')
                                            
                                            <button type=submit class="btn btn-danger bg-red-500 btn-sm mr-4"><i class="fa fa-trash"></i></button>
                                        </form>
                                        @endcan
                                    </div>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="card mt-2">
                <div class="card-footer">
                    {{$productos->links()}}
                </div>
            </div>

        @else
            <div class="h-20 w-full bg-gray-500 rounded-lg text-center text-white flex items-center justify-center"><strong>No hay ningún registro</strong></div>
        @endif

    
</div>

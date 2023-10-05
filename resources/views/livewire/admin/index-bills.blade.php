<div>
    @if (session('info'))
    <div class="alert alert-danger">
        <strong>{{session('info')}}</strong>
    </div>
    @endif

    @if (session('info-success'))
    <div class="alert alert-success">
        <strong>{{session('info-success')}}</strong>
    </div>
    @endif
    <div class="border border-1 rounded-xl mb-3">
        @can('admin.bills.create')
        <div class="bg-gray-200 rounded-t-xl px-4 pt-3 pb-3">
            <a wire:click="create" class="bg-gray-500 px-4 py-2 rounded-2xl text-gray-100 hover:text-gray-200 hover:bg-gray-600 cursor-pointer">Crear Cotización</a>
        </div>
        @endcan
        <div class="bg-gray-500 rounded-b-xl px-4 py-2">
            <input wire:model="search" class="rounded-xl focus:border-black focus:ring-1 focus:ring-black " placeholder="Ingrese el nombre del cliente">
        </div>
    </div>




        <div class="relative overflow-x-auto shadow-md sm:rounded-lg rounded-xl border border-gray-300 bg-gray-100">
            <table class="w-full text-sm text-left text-gray-100 dark:text-gray-100 border-none">
                <thead class="text-xs text-gray-100 uppercase bg-gray-50 dark:bg-gray-500 dark:text-gray-100 border-none">
                    <tr>
                        <th scope="col" class="px-6 py-3 border-none">ID</th>
                        <th scope="col" class="px-6 py-3 border-none">Fecha</th>
                        <th scope="col" class="px-6 py-3 border-none">ID cliente</th>
                        <th scope="col" class="px-6 py-3 border-none">ID usuario</th>
                        <th scope="col" class="px-6 py-3 border-none">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cotizaciones as $cotizacion)
                    <tr class="border-none">
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowra border-r-0 border-l-0">{{$cotizacion->id}}</td>
                        <td class="px-6 py-4 font-medium text-gray-900 border-r-0 border-l-0">{{$cotizacion->fecha}}</td>
                        <td class="px-6 py-4 font-medium text-gray-900 border-r-0 border-l-0">{{ $cotizacion->cliente_id ? $clientes[intval($cotizacion->cliente_id)] : ""}}</td>
                        <td class="px-6 py-4 font-medium text-gray-900 border-r-0 border-l-0" >{{$cotizacion->user_id ? $usuarios[intval($cotizacion->user_id)] : ""}}</td>

                        <td class="px-6 py-4 border-r-0 border-l-0 w-80">
                            <div class="flex">
                                <a href="{{route('admin.bills.show', $cotizacion)}}" class="btn btn-secondary btn-sm mr-4"><i class="fa fa-eye"></i></a>
                                @can('admin.bills.edit')
                                <a href="{{route('admin.bills.edit', $cotizacion)}}" class="btn btn-primary mr-4"><i class="fa fa-edit"></i></a>
                                @endcan
                                @can('admin.bills.destroy')
                                <form action="{{route('admin.bills.destroy', $cotizacion)}}" method="POST">
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

            @if ($cotizaciones->count() == 0)
            <div class="">
                <div class="justify-content-center text-center pb-4">
                    <strong>No hay registros</strong>
                </div>
            </div>
            @endif
        </div>

        <div class="card-footer mt-2">
            {{$cotizaciones->links()}}
        </div>




</div>

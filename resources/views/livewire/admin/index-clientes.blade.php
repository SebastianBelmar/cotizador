<div>
    <div class="card">
        <div class="card-header">
            <a href="{{route('admin.clientes.create')}}" class="btn btn-secondary">Agregar Cliente</a>
        </div>
        <div class="card-header">
            <input wire:model="search" type="text" class="form-control" placeholder="Buscar cliente por nombre o e-mail">
        </div>
    </div>

        @if($clientes->count())

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg rounded-xl border border-gray-300 bg-gray-100">
            <table class="w-full text-sm text-left text-gray-100 dark:text-gray-100 border-none">
                <thead class="text-xs text-gray-100 uppercase bg-gray-50 dark:bg-gray-500 dark:text-gray-100 border-none">
                    <tr>
                        <th scope="col" class="px-6 py-3 border-none">
                            ID
                        </th>
                        <th scope="col" class="px-6 py-3 border-none">
                            Nombre
                        </th>
                        <th scope="col" class="px-6 py-3 border-none">
                            Email
                        </th>
                        <th scope="col" class="px-6 py-3 border-none">
                            Acciones
                        </th>
                    </tr>
                </thead>
                <tbody >
                    @foreach ($clientes as $cliente)
                        <tr class="border-none">
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowra border-r-0 border-l-0">{{$cliente->id}}</td>
                            <td class="px-6 py-4 font-medium text-gray-900  border-r-0 border-l-0">{{$cliente->name}}</td>
                            <td class="px-6 py-4 font-medium text-gray-900 border-r-0 border-l-0">{{$cliente->email}}</td>

                            <td class="px-6 py-4 border-r-0 border-l-0">

                                <div class="flex">
                                    <a href="{{route('admin.clientes.edit', $cliente)}}" class="btn btn-primary mr-4"><i class="fa fa-edit"></i></a>

                                    <form action="{{route('admin.clientes.destroy', $cliente)}}" method="POST">
                                        @csrf
                                        @method('delete')
                                        
                                        <button type=submit class="btn btn-danger bg-red-500 btn-sm mr-4"><i class="fa fa-trash"></i></button>
                                    </form>
                                </div>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>   

        <div class="card-footer mt-2">
            {{$clientes->links()}}
        </div>

        @else
        <div class="card mt-4">
            <div class="card-body row justify-content-center">
                <strong>No hay registros</strong>
            </div>
        </div>
        @endif
</div>

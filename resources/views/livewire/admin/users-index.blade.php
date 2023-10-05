<div>

    <div class="border border-1 rounded-xl mb-3">
        @can('admin.productos.create')
        <div class="bg-gray-200 rounded-t-xl px-4 pt-3 pb-3">
            <a href="{{route('admin.users.create')}}" class="bg-gray-500 px-4 py-2 rounded-2xl text-gray-100 hover:text-gray-200 hover:bg-gray-600">Agregar Usuario</a>
        </div>
        @endcan
        <div class="bg-gray-500 rounded-b-xl px-4 py-2">
            <input wire:model="search" class="rounded-xl focus:border-black focus:ring-1 focus:ring-black " placeholder="ingrese el nombre o correo de un usuario">
        </div>
    </div>

        @if($users->count())

        <div class="relative overflow-x-auto shadow-xl sm:rounded-lg rounded-xl border border-gray-300 bg-gray-100">
            <table class="w-full text-sm text-left text-gray-100 dark:text-gray-100 border-gray-300">
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
                    @foreach ($users as $user)
                        <tr class="border-none">
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowra border-r-0 border-l-0">{{$user->id}}</td>
                            <td class="px-6 py-4 font-medium text-gray-900  border-r-0 border-l-0">{{$user->name}}</td>
                            <td class="px-6 py-4 font-medium text-gray-900 border-r-0 border-l-0">{{$user->email}}</td>

                            <td class="px-6 py-4 border-r-0 border-l-0">

                                <div class="flex">
                                    @can('admin.productos.edit')
                                    <a href="{{route('admin.users.edit', $user)}}" class="btn btn-primary mr-4"><i class="fa fa-edit"></i></a>
                                    @endcan
                                    @can('admin.productos.destroy')
                                    <form action="{{route('admin.users.destroy', $user)}}" method="POST">
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

        <div class="card mt-4 ">
            <div class="card-footer">
                {{$users->links()}}
            </div>
        </div>

        @else
        <div class="h-20 w-full bg-gray-500 rounded-lg text-center text-white flex items-center justify-center"><strong>No hay ningún registro</strong></div>
        @endif
    
</div>

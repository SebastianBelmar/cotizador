<div class="relative mx-1 overflow-x-auto shadow-xl sm:rounded-lg rounded-xl border border-gray-300 bg-gray-100 mb-4">

    <table class="w-full text-sm text-left text-gray-100 dark:text-gray-100 border-gray-300">
        <thead class="text-xs text-gray-100 uppercase bg-gray-50 dark:bg-gray-500 dark:text-gray-100 border-none">
                <tr>
                    <th scope="col" class="px-6 py-3 border-none">ID</th>
                    <th scope="col" class="px-6 py-3 border-none">Nombre</th>
                    <th scope="col" class="px-6 py-3 border-none">Email</th>
                    <th scope="col" class="px-6 py-3 border-none"></th>
                </tr>
            </thead>

            <tbody>
                @foreach ($datosEmpresas as $datosEmpresa)
                <tr class="border-none">
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowra border-r-0 border-l-0">{{$datosEmpresa->id}}</td>
                    <td class="px-6 py-4 font-medium text-gray-900  border-r-0 border-l-0">{{$datosEmpresa->name}}</td>
                    <td class="px-6 py-4 font-medium text-gray-900 border-r-0 border-l-0">{{$datosEmpresa->email}}</td>

                    <td class="px-6 py-4 border-r-0 border-l-0">

                        <div class="flex">
                            <a href="{{route('admin.datos-empresas.edit', $datosEmpresa)}}" class="btn btn-primary mr-4"><i class="fa fa-edit"></i></a>

                            <form action="{{route('admin.datos-empresas.destroy', $datosEmpresa)}}" method="POST">
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
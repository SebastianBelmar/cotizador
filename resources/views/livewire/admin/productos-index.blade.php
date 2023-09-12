<div>

    @if (session('info'))
    <div class="alert alert-danger">
        <strong>{{session('info')}}</strong>
    </div>
    @endif
    <div class="card">
        <div class="card-header">
            <input wire:model="search" class="form-control" placeholder="Ingrese el nombre de un producto">
        </div>

        <div class="card-header">
            <a href="{{route('admin.productos.create')}}" class="btn btn-secondary">Agregar Producto</a>
        </div>

        @if ($productos->count())
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th colspan="2"></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($productos as $producto)
                            <tr>
                                <td>{{$producto->id}}</td>
                                <td>{{$producto->name}}</td>
                                <td width=10px>
                                    <a href="{{route('admin.productos.edit', $producto, $hola)}}" class="btn btn-primary btn-sm">Editar</a>
                                </td>
                                <td width=10px>
                                    <form action="{{route('admin.productos.destroy', $producto)}}" method="POST">
                                        @csrf
                                        @method('delete')
                                        
                                        <button type=submit class="btn btn-danger btn-sm">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="card-footer">
                {{$productos->links()}}
            </div>
        @else
            <div class="card-body"><strong>No hay ningún registro</strong></div>
        @endif

    </div>
</div>

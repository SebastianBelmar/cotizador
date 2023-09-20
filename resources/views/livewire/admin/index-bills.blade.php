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

    <div class="card">
        <div class="card-header">
            <a wire:click="create" class="btn btn-secondary">Crear Cotizacion</a>
        </div>
        <div class="card-header">
            <input wire:model="search" class="form-control bg-gray-100" placeholder="Ingrese el nombre del cliente ">
        </div>
    </div>



    <div class="card">
        <div class="card-header">
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Fecha</th>
                            <th>ID cliente</th>
                            <th>ID usuario</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cotizaciones as $cotizacion)
                        <tr>
                            <td>{{$cotizacion->id}}</td>
                            <td>{{$cotizacion->fecha}}</td>
                            <td>{{$cotizacion->cliente_id}}</td>
                            <td>{{$cotizacion->user_id}}</td>

                            <td class="w-1">
                                <a href="{{route('admin.bills.show', $cotizacion)}}" class="btn btn-secondary btn-sm">Mostrar</a>
                            </td>
        
                            <td class="w-1">
                                <a href="{{route('admin.bills.edit', $cotizacion)}}" class="btn btn-primary btn-sm">Editar</a>
                            </td>

                            <td>
                                <form action="{{route('admin.bills.destroy', $cotizacion)}}" method="POST">
                                    @csrf
                                    @method('delete')
        
                                    <button type="submit" class="btn bg-red-500 btn-danger btn-sm">Eliminar</button>
                                </form>
                            </td>
        
        
                            </div>
        
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card-footer">
            {{$cotizaciones->links()}}
        </div>

        @if ($cotizaciones->count() == 0)
        <div class="card-body text-center">
            <strong>No hay registros</strong>
        </div>
        @endif
    </div>

</div>

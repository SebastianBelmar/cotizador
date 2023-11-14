<div class="mt-4">

    {!! Form::label('name', 'Nombre', ['class' => 'text-lg text-oscuro pt-4']) !!}
    {!! Form::text('name', null, ['class' => 'rounded-lg bg-claro border-0 ring-2 ring-medioClaro focus:ring-principal focus:border-principal focus:ring-2 focus:border p-4 mt-1 placeholder:text-lg', 'placeholder' => 'Ingrese el nombre del rol']) !!}
    
    <x-input-error for="name"/>
</div>

<div class="bg-claro p-4 rounded-2xl mt-6">
<h2 class="text-xl font-semibold text-oscuro bg-claro pt-0 pb-2 border-b border-medioClaro">Lista de permisos</h2>


@foreach ($permissions as $permission)
    <div class="flex flex-col items-start justify-center">
        <label class="flex items-center justify-center my-2">
            {!! Form::checkbox('permissions[]', $permission->id, null, ['class' => 'rounded-lg bg-claro border-0 ring-2 ring-medioClaro focus:ring-principal focus:border-principal focus:ring-2 focus:border p-2 mt-1 placeholder:text-lg text-principal mr-2']) !!}
            <p class="text-oscuro">{{$permission->description}}</p>
        </label>
    </div>
@endforeach
</div>
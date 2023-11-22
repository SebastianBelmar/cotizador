<div class="mt-4">

    {!! Form::label('name', 'Nombre', ['class' => 'text-lg text-oscuro pt-4']) !!}
    {!! Form::text('name', null, ['class' => 'rounded-lg bg-claro border-0 ring-2 ring-medioClaro focus:ring-principal focus:border-principal focus:ring-2 focus:border p-4 mt-1 placeholder:text-lg', 'placeholder' => 'Ingrese el Nombre']) !!}
    
    <x-input-error for="name"/>

</div>

<div class="mt-4">

    {!! Form::label('last_name', 'Apellido', ['class' => 'text-lg text-oscuro pt-4']) !!}
    {!! Form::text('last_name', null, ['class' => 'rounded-lg bg-claro border-0 ring-2 ring-medioClaro focus:ring-principal focus:border-principal focus:ring-2 focus:border p-4 mt-1 placeholder:text-lg', 'placeholder' => 'Ingrese el Apellido']) !!}
    
    <x-input-error for="last_name"/>

</div>

<div class="mt-4">

    {!! Form::label('email', 'Email', ['class' => 'text-lg text-oscuro pt-4']) !!}
    {!! Form::text('email', null, ['class' => 'rounded-lg bg-claro border-0 ring-2 ring-medioClaro focus:ring-principal focus:border-principal focus:ring-2 focus:border p-4 mt-1 placeholder:text-lg', 'placeholder' => 'Ingrese el Email']) !!}
    
    <x-input-error for="email"/>

</div>

<div class="mt-4">

    {!! Form::label('phone', 'Teléfono', ['class' => 'text-lg text-oscuro pt-4']) !!}
    {!! Form::text('phone', null, ['class' => 'rounded-lg bg-claro border-0 ring-2 ring-medioClaro focus:ring-principal focus:border-principal focus:ring-2 focus:border p-4 mt-1 placeholder:text-lg', 'placeholder' => 'Ingrese el Teléfono']) !!}
    
    <x-input-error for="phone"/>

</div>


<div class="mt-4">

    {!! Form::label('password', 'Contraseña', ['class' => 'text-lg text-oscuro pt-4']) !!}
    <input type="password" id="password" name="password" class="rounded-lg bg-claro border-0 ring-2 ring-medioClaro focus:ring-principal focus:border-principal focus:ring-2 focus:border p-4 mt-1 placeholder:text-lg" placeholder="Ingrese la Contraseña">

    <x-input-error for="password"/>

</div>


@if($user->id == 1)
<div class="form-group">
<h3 class="text-oscuro text-lg mb-2 mt-3">Asignar Rol</h3>
@foreach ($roles as $role)
    <div class="flex flex-col items-start justify-center">
        <label class="flex items-center justify-center my-2">
            @if($role->name == 'Administrador')
                <input type="checkbox" class="rounded-lg bg-claro border-0 ring-2 ring-medioClaro focus:ring-principal focus:border-principal focus:ring-2 focus:border p-2 mt-1 placeholder:text-lg text-medio mr-2 pointer-events-none cursor-not-allowed" checked onclick="return false;">
                <p class="text-oscuro">{{$role->name}} </p>
            @else
                <input type="checkbox" class="rounded-lg bg-claro border-0 ring-2 ring-medioClaro focus:ring-principal focus:border-principal focus:ring-2 focus:border p-2 mt-1 placeholder:text-lg text-principal mr-2 pointer-events-none cursor-not-allowed"  onclick="return false;">
                <p class="text-oscuro">{{$role->name}} </p>
            @endif
        </label>
    </div>
@endforeach
</div>
@else
<div class="form-group">
    <h3 class="text-oscuro text-lg mb-2 mt-3">Asignar Rol</h3>
    @foreach ($roles as $role)
        <div class="flex flex-col items-start justify-center">
            <label class="flex items-center justify-center my-2">
                {!! Form::checkbox('roles[]', $role->id, null, ['class' => 'rounded-lg bg-claro border-0 ring-2 ring-medioClaro focus:ring-principal focus:border-principal focus:ring-2 focus:border p-2 mt-1 placeholder:text-lg text-principal mr-2']) !!}
                <p class="text-oscuro">{{$role->name}}</p>
            </label>
        </div>
    @endforeach
</div>
@endif

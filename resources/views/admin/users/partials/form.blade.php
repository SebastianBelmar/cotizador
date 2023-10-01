<div class="form-group">
{!! Form::label('name', 'Nombre') !!}
{!! Form::text('name', null, ['class' => 'form-control text-gray rounded-lg', 'placeholder' => 'Ingrese el Nombre ']) !!}

@error('name')
    <span class="text-danger">{{$message}}</span>
@enderror
</div>


<div class="form-group">
{!! Form::label('last_name', 'Apellido') !!}
{!! Form::text('last_name', null, ['class' => 'form-control text-gray rounded-lg', 'placeholder' => 'Ingrese el Apellido']) !!}

@error('last_name')
    <span class="text-danger">{{$message}}</span>
@enderror
</div>

<div class="form-group">
{!! Form::label('email', 'Email') !!}
{!! Form::text('email', null, ['class' => 'form-control text-gray rounded-lg', 'placeholder' => 'Ingrese el Email']) !!}

@error('email')
    <span class="text-danger">{{$message}}</span>
@enderror
</div>

<div class="form-group">
{!! Form::label('phone', 'Teléfono') !!}
{!! Form::text('phone', null, ['class' => 'form-control text-gray rounded-lg', 'placeholder' => 'Ingrese el Teléfono']) !!}

@error('phone')
    <span class="text-danger">{{$message}}</span>
@enderror
</div>

<div class="form-group">
<label for="password">Contraseña:</label>
<input type="password" id="password" name="password" class="form-control text-gray rounded-lg">

@error('password')
    <span class="text-danger">{{$message}}</span>
@enderror
</div>

<div class="form-group">
<h3 class="text-gray-600 text-lg mb-2 mt-3">Asignar Rol</h3>
@foreach ($roles as $role)
    <div>
        <label>
            {!! Form::checkbox('roles[]', $role->id, null, ['class' => 'mr-1']) !!}
            {{$role->name}}
        </label>
    </div>
@endforeach
</div>
<div class="form-group">
    {!! Form::label('name', 'Nombre') !!}
    {!! Form::text('name', null, ['class' => 'form-control rounded-lg text-black', 'placeholder' => 'Ingrese el nombre del cliente']) !!}

    @error('name')
        <span class="text-danger">{{$message}}</span>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('last_name', 'Apellido') !!}
    {!! Form::text('last_name', null, ['class' => 'form-control rounded-lg text-black', 'placeholder' => 'Ingrese el apellido del cliente']) !!}

    @error('last_name')
        <span class="text-danger">{{$message}}</span>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('email', 'Email') !!}
    {!! Form::text('email', null, ['class' => 'form-control rounded-lg text-black', 'placeholder' => 'Ingrese el e-mail del cliente']) !!}

    @error('email')
        <span class="text-danger">{{$message}}</span>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('phone', 'Teléfono') !!}
    {!! Form::text('phone', null, ['class' => 'form-control rounded-lg text-black', 'placeholder' => 'Ingrese el teléfono del cliente']) !!}

    @error('phone')
        <span class="text-danger">{{$message}}</span>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('address', 'Dirección') !!}
    {!! Form::text('address', null, ['class' => 'form-control rounded-lg text-black', 'placeholder' => 'Ingrese la dirección del cliente']) !!}

    @error('address')
        <span class="text-danger">{{$message}}</span>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('city', 'Ciudad') !!}
    {!! Form::text('city', null, ['class' => 'form-control rounded-lg text-black', 'placeholder' => 'Ingrese la ciudad del cliente']) !!}

    @error('city')
        <span class="text-danger">{{$message}}</span>
    @enderror
</div>
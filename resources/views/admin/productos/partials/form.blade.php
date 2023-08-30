<div class="form-group">
    {!! Form::label('name', 'Nombre') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre del producto']) !!}

    @error('name')
        <span class="text-danger">{{$message}}</span>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('code', 'Codigo') !!}
    {!! Form::text('code', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el codigo del producto']) !!}

    @error('code')
    <span class="text-danger">{{$message}}</span>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('description', 'Descripcion') !!}
    {!! Form::text('description', null, ['class' => 'form-control', 'placeholder' => 'Ingrese la descripción del producto']) !!}

    @error('description')
    <span class="text-danger">{{$message}}</span>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('price', 'Precio') !!}
    {!! Form::text('price', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el precio del producto']) !!}

    @error('price')
    <span class="text-danger">{{$message}}</span>
    @enderror
</div>
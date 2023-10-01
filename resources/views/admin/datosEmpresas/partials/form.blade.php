<div class="form-group">
    {!! Form::label('name', 'Nombre') !!}
    {!! Form::text('name', null, ['class' => 'form-control text-gray rounded-lg', 'placeholder' => 'Ingrese el Nombre de la Empresa']) !!}
    
    @error('name')
        <span class="text-danger">{{$message}}</span>
    @enderror
    </div>
    
    
    <div class="form-group">
    {!! Form::label('address', 'Dirección') !!}
    {!! Form::text('address', null, ['class' => 'form-control text-gray rounded-lg', 'placeholder' => 'Ingrese la Dirección']) !!}
    
    @error('address')
        <span class="text-danger">{{$message}}</span>
    @enderror
    </div>

    <div class="form-group">
    {!! Form::label('city', 'Ciudad') !!}
    {!! Form::text('city', null, ['class' => 'form-control text-gray rounded-lg', 'placeholder' => 'Ingrese la Ciudad']) !!}
    
    @error('city')
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
    {!! Form::label('website', 'Sitio Web') !!}
    {!! Form::text('website', null, ['class' => 'form-control text-gray rounded-lg', 'placeholder' => 'Ingrese el Sitio Web']) !!}
    
    @error('website')
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
    {!! Form::label('office_hours', 'Horario') !!}
    {!! Form::text('office_hours', null, ['class' => 'form-control text-gray rounded-lg', 'placeholder' => 'Ingrese el Horario']) !!}
    
    @error('office_hours')
        <span class="text-danger">{{$message}}</span>
    @enderror
    </div>
    
    </div>
<div class="mt-4">

    {!! Form::label('name', 'Nombre', ['class' => 'text-lg text-oscuro pt-4']) !!}
    {!! Form::text('name', null, ['class' => 'rounded-lg bg-claro border-0 ring-2 ring-medioClaro focus:ring-principal focus:border-principal focus:ring-2 focus:border p-4 mt-1 placeholder:text-lg', 'placeholder' => 'Ingrese el Nombre del Cliente']) !!}
    
    <x-input-error for="name"/>

</div>

<div class="mt-4">

    {!! Form::label('rut', 'Rut', ['class' => 'text-lg text-oscuro pt-4']) !!}
    {!! Form::text('rut', null, ['class' => 'rounded-lg bg-claro border-0 ring-2 ring-medioClaro focus:ring-principal focus:border-principal focus:ring-2 focus:border p-4 mt-1 placeholder:text-lg', 'placeholder' => 'Ingrese el Rut del Cliente']) !!}
    
    <x-input-error for="rut"/>

</div>

<div class="mt-4">
    {!! Form::label('giro', 'Giro', ['class' => 'text-lg text-oscuro pt-4']) !!}
    {!! Form::text('giro', null, ['class' => 'rounded-lg bg-claro border-0 ring-2 ring-medioClaro focus:ring-principal focus:border-principal focus:ring-2 focus:border p-4 mt-1 placeholder:text-lg', 'placeholder' => 'Ingrese el Giro del Cliente']) !!}
    
    <x-input-error for="giro"/>
</div>


<div class="mt-4">
    {!! Form::label('email', 'Email', ['class' => 'text-lg text-oscuro pt-4']) !!}
    {!! Form::text('email', null, ['class' => 'rounded-lg bg-claro border-0 ring-2 ring-medioClaro focus:ring-principal focus:border-principal focus:ring-2 focus:border p-4 mt-1 placeholder:text-lg', 'placeholder' => 'Ingrese el Email del Cliente']) !!}
    
    <x-input-error for="email"/>
</div>

<div class="mt-4">
    {!! Form::label('phone', 'Teléfono', ['class' => 'text-lg text-oscuro pt-4']) !!}
    {!! Form::text('phone', null, ['class' => 'rounded-lg bg-claro border-0 ring-2 ring-medioClaro focus:ring-principal focus:border-principal focus:ring-2 focus:border p-4 mt-1 placeholder:text-lg', 'placeholder' => 'Ingrese el teléfono del Cliente']) !!}
    
    <x-input-error for="phone"/>
</div>

<div class="mt-4">
    {!! Form::label('address', 'Dirección', ['class' => 'text-lg text-oscuro pt-4']) !!}
    {!! Form::text('address', null, ['class' => 'rounded-lg bg-claro border-0 ring-2 ring-medioClaro focus:ring-principal focus:border-principal focus:ring-2 focus:border p-4 mt-1 placeholder:text-lg', 'placeholder' => 'Ingrese la dirección del Cliente']) !!}
    
    <x-input-error for="address"/>
</div>

<div class="mt-4">
    {!! Form::label('city', 'Ciudad', ['class' => 'text-lg text-oscuro pt-4']) !!}
    {!! Form::text('city', null, ['class' => 'rounded-lg bg-claro border-0 ring-2 ring-medioClaro focus:ring-principal focus:border-principal focus:ring-2 focus:border p-4 mt-1 placeholder:text-lg', 'placeholder' => 'Ingrese la ciudad del Cliente']) !!}
    
    <x-input-error for="city"/>
</div>

<div class="mt-4">
    {!! Form::label('horario', 'Horario', ['class' => 'text-lg text-oscuro pt-4']) !!}
    {!! Form::text('horario', null, ['class' => 'rounded-lg bg-claro border-0 ring-2 ring-medioClaro focus:ring-principal focus:border-principal focus:ring-2 focus:border p-4 mt-1 placeholder:text-lg', 'placeholder' => 'Ingrese el horario del Cliente']) !!}
    
    <x-input-error for="horario"/>
</div>
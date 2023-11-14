<div class="mt-4">
    {!! Form::label('name', 'Nombre', ['class' => 'text-lg text-oscuro pt-4']) !!}
    {!! Form::text('name', null, ['class' => 'rounded-lg bg-claro border-0 ring-2 ring-medioClaro focus:ring-principal focus:border-principal focus:ring-2 focus:border p-4 mt-1 placeholder:text-lg', 'placeholder' => 'Ingrese el Nombre de la Empresa']) !!}
    
    <x-input-error for="name"/>
</div>
    
    
<div class="mt-4">
    {!! Form::label('rut', 'Rut', ['class' => 'text-lg text-oscuro pt-4']) !!}
    {!! Form::text('rut', null, ['class' => 'rounded-lg bg-claro border-0 ring-2 ring-medioClaro focus:ring-principal focus:border-principal focus:ring-2 focus:border p-4 mt-1 placeholder:text-lg', 'placeholder' => 'Ingrese el rut']) !!}
    
    <x-input-error for="rut"/>
</div>

<div class="mt-4">
    {!! Form::label('giro', 'Giro', ['class' => 'text-lg text-oscuro pt-4']) !!}
    {!! Form::text('giro', null, ['class' => 'rounded-lg bg-claro border-0 ring-2 ring-medioClaro focus:ring-principal focus:border-principal focus:ring-2 focus:border p-4 mt-1 placeholder:text-lg', 'placeholder' => 'Ingrese el Giro']) !!}
    
    <x-input-error for="giro"/>

</div>

<div class="mt-4">
    {!! Form::label('address', 'Dirección', ['class' => 'text-lg text-oscuro pt-4']) !!}
    {!! Form::text('address', null, ['class' => 'rounded-lg bg-claro border-0 ring-2 ring-medioClaro focus:ring-principal focus:border-principal focus:ring-2 focus:border p-4 mt-1 placeholder:text-lg', 'placeholder' => 'Ingrese la Dirección']) !!}
    
    <x-input-error for="address"/>

</div>

<div class="mt-4">
    {!! Form::label('city', 'Ciudad', ['class' => 'text-lg text-oscuro']) !!}
    {!! Form::text('city', null, ['class' => 'rounded-lg bg-claro border-0 ring-2 ring-medioClaro focus:ring-principal focus:border-principal focus:ring-2 focus:border p-4 mt-1 placeholder:text-lg', 'placeholder' => 'Ingrese la Ciudad']) !!}
    
    <x-input-error for="city"/>
</div>
    
<div class="mt-4">
    {!! Form::label('email', 'Email', ['class' => 'text-lg text-oscuro']) !!}
    {!! Form::text('email', null, ['class' => 'rounded-lg bg-claro border-0 ring-2 ring-medioClaro focus:ring-principal focus:border-principal focus:ring-2 focus:border p-4 mt-1 placeholder:text-lg', 'placeholder' => 'Ingrese el Email']) !!}
    
    <x-input-error for="email"/>
</div>

<div class="mt-4">
    {!! Form::label('website', 'Sitio Web', ['class' => 'text-lg text-oscuro']) !!}
    {!! Form::text('website', null, ['class' => 'rounded-lg bg-claro border-0 ring-2 ring-medioClaro focus:ring-principal focus:border-principal focus:ring-2 focus:border p-4 mt-1 placeholder:text-lg', 'placeholder' => 'Ingrese el Sitio Web']) !!}
    
    <x-input-error for="website"/>
</div>
    
<div class="mt-4">
    {!! Form::label('phone', 'Teléfono', ['class' => 'text-lg text-oscuro']) !!}
    {!! Form::text('phone', null, ['class' => 'rounded-lg bg-claro border-0 ring-2 ring-medioClaro focus:ring-principal focus:border-principal focus:ring-2 focus:border p-4 mt-1 placeholder:text-lg', 'placeholder' => 'Ingrese el Teléfono']) !!}
    
    <x-input-error for="phone"/>
</div>

<div class="mt-4">
    {!! Form::label('office_hours', 'Horario', ['class' => 'text-lg text-oscuro']) !!}
    {!! Form::text('office_hours', null, ['class' => 'rounded-lg bg-claro border-0 ring-2 ring-medioClaro focus:ring-principal focus:border-principal focus:ring-2 focus:border p-4 mt-1 placeholder:text-lg', 'placeholder' => 'Ingrese el Horario']) !!}
    
    <x-input-error for="office_hours"/>
</div>
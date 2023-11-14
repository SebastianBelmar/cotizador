
<div class="mt-4">

    {!! Form::label('name', 'Nombre', ['class' => 'text-lg text-oscuro pt-4']) !!}
    {!! Form::text('name', null, ['class' => 'rounded-lg bg-claro border-0 ring-2 ring-medioClaro focus:ring-principal focus:border-principal focus:ring-2 focus:border p-4 mt-1 placeholder:text-lg', 'placeholder' => 'Ingrese el nombre del producto']) !!}
    
    <x-input-error for="name"/>

</div>

<div class="mt-4">

    {!! Form::label('code', 'Codigo', ['class' => 'text-lg text-oscuro pt-4']) !!}
    {!! Form::text('code', null, ['class' => 'rounded-lg bg-claro border-0 ring-2 ring-medioClaro focus:ring-principal focus:border-principal focus:ring-2 focus:border p-4 mt-1 placeholder:text-lg', 'placeholder' => 'Ingrese el código del producto']) !!}
    
    <x-input-error for="code"/>

</div>

<div class="mt-4">

    {!! Form::label('description', 'Descripcion', ['class' => 'text-lg text-oscuro pt-4']) !!}
    {!! Form::text('description', null, ['class' => 'rounded-lg bg-claro border-0 ring-2 ring-medioClaro focus:ring-principal focus:border-principal focus:ring-2 focus:border p-4 mt-1 placeholder:text-lg', 'placeholder' => 'Ingrese la descripción del producto']) !!}
    
    <x-input-error for="description"/>

</div>

<div class="mt-4">

    {!! Form::label('price', 'Precio', ['class' => 'text-lg text-oscuro pt-4']) !!}
    {!! Form::text('price', null, ['class' => 'rounded-lg bg-claro border-0 ring-2 ring-medioClaro focus:ring-principal focus:border-principal focus:ring-2 focus:border p-4 mt-1 placeholder:text-lg', 'placeholder' => 'Ingrese el precio del producto']) !!}
    
    <x-input-error for="price"/>

</div>
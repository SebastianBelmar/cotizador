@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300  focus:border-principal  focus:ring-principal rounded-md shadow-sm']) !!}>

@props(['id' => null, 'maxWidth' => null])

<x-modal-cotizacion :id="$id" :maxWidth="$maxWidth" {{ $attributes }}>

    <div >
        {{ $title }}
    </div>

    <div >
        {{ $content }}
    </div>

    <div >
        {{ $footer }}
    </div>
    
</x-modal-cotizacion>

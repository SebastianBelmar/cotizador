@props(['id' => null])

<x-modal-bill :id="$id"  {{ $attributes }}>

    <div>
        {{ $title }}
    </div>

    <div>
        {{ $content }}
    </div>

    <div>
        {{ $footer }}
    </div>
</x-modal-bill>

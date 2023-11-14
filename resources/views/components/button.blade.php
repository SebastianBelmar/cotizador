<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-medioClaro border border-medioClaro rounded-md font-semibold uppercase tracking-widest hover:bg-blanco focus:bg-blanco active:bg-blanco focus:outline-none focus:ring-2 focus:ring-medio focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>

<button {{ $attributes->merge(['type' => 'submit', 'class' => 'bg-gray-700 hover:bg-sky-800 text-white py-2 px-4 rounded transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>

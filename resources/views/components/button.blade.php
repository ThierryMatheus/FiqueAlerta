<button {{ $attributes->merge(['type' => 'submit', 'class' => 'text-sm text-white bg-blue-750 rounded-md p-1 px-28']) }}>
    {{ $slot }}
</button>

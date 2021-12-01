<button {{ $attributes->merge(['type' => 'submit', 'class' => 'text-base text-white bg-blue-750 rounded-md p-2 px-40']) }}>
    {{ $slot }}
</button>

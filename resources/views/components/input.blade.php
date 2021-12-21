@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-0 px-2 leading-tight focus:outline-none']) !!}>

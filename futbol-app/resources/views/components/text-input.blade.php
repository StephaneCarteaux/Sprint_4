@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-400 focus:border-sky-500 focus:ring-sky-500 rounded-md shadow-sm h-10']) !!}>

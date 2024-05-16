<x-app-layout>
    <x-slot:title>
        {{ __('Error') }}
    </x-slot>

    <x-header>
        <x-slot:title>
            {{ __('Error') }}
        </x-slot>
    </x-header>

    <div class="text-center">
        <h1 class="text-5xl font-bold">{{ __('404') }}</h1>
        <p class="text-3xl font-bold">{{ __('Page not found') }}</p>
    </div>
</x-app-layout>

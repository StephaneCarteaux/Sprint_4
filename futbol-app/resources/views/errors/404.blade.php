<x-app-layout>
    <x-slot:title>
        {{ __('Oops') }}
    </x-slot>

    <x-header>
        <x-slot:title>
            <span class="!normal-case">{{ __('Oops') }}</span>
        </x-slot>
    </x-header>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg border-2 border-gray-700 mt-16 text-center">
        <div class="p-12">
            <div class="flex items-center justify-center text-6xl font-bold pb-6">4<x-404-logo />4</div>
            <p class="text-3xl font-bold">{{ __('The page you are looking for could not be found.') }}</p>

            <!-- Buttons container -->
            <div class="flex justify-center mt-6 space-x-6">
                <!-- Return button -->
                <x-secondary-button>
                    <a href="{{ route('home.index') }}">{{ __('back') }}</a>
                </x-secondary-button>
            </div>
        </div>
    </div>
</x-app-layout>

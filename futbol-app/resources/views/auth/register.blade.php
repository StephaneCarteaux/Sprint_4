<x-app-layout>
    <x-slot:title>
        {{ __('auth_register') }}
    </x-slot>
    <div>
        <h2 class="flex flex-row flex-nowrap items-center mt-16 uppercase">
            <span class="flex-grow block border-t border-gray-700"></span>
            <span
                class="flex-none block mx-4 px-4 py-2.5 text-xl rounded leading-none font-medium bg-gray-700 text-white">
                {{ __('auth_register') }}
            </span>
            <span class="flex-grow block border-t border-gray-700"></span>
        </h2>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg border-2 border-gray-700 bg-gray-300 mt-16 mb-6 sm:w-full md:w-1/2 lg:w-1/2 xl:w-[600px] mx-auto">

    <form method="POST" action="{{ route('register') }}" class="max-w-sm mx-auto mt-8 mb-8">
        @csrf

        <!-- Name -->
        <div class="mb-5 px-3">
            <x-input-label for="name" :value="__('name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mb-5 px-3">
            <x-input-label for="email" :value="__('auth_email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mb-5 px-3">
            <x-input-label for="password" :value="__('auth_password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mb-5 px-3">
            <x-input-label for="password_confirmation" :value="__('auth_confirm_password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mb-5 px-3">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('auth_already_registered') }}
            </a>

            <x-primary-button class="ms-4 my-5">
                {{ __('auth_register') }}
            </x-primary-button>
        </div>
    </form>
    </div>
    </div>
</x-app-layout>

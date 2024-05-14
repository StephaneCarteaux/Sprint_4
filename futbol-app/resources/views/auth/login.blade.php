<x-app-layout>
    <x-slot:title>
        {{ __('auth_login') }}
    </x-slot>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div>
        <h2 class="flex flex-row flex-nowrap items-center mt-16 uppercase">
            <span class="flex-grow block border-t border-gray-700"></span>
            <span
                class="flex-none block mx-4 px-4 py-2.5 text-xl rounded leading-none font-medium bg-gray-700 text-white">
                {{ __('auth_login') }}
            </span>
            <span class="flex-grow block border-t border-gray-700"></span>
        </h2>

        <div
            class="relative overflow-x-auto shadow-md sm:rounded-lg border-2 border-gray-700 bg-gray-300 mt-16 mb-6 sm:w-full md:w-1/2 lg:w-1/2 xl:w-[600px] mx-auto">
            <form method="POST" action="{{ route('login') }}" class="max-w-sm mx-auto mt-8 mb-8">
                @csrf

                <!-- Email Address -->
                <div class="mb-5 px-3">
                    <x-input-label for="email" :value="__('auth_email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                        :value="old('email')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mb-5 px-3">
                    <x-input-label for="password" :value="__('auth_password')" />

                    <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                        autocomplete="current-password" />

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Remember Me -->
                <div class="block mb-5 px-3">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox"
                            class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                            name="remember">
                        <span class="ms-2 text-sm text-gray-600">{{ __('auth_remember_me') }}</span>
                    </label>
                </div>

                <div class="flex items-center justify-end mb-5 px-3">
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                            href="{{ route('password.request') }}">
                            {{ __('auth_forgot_your_password') }}
                        </a>
                    @endif

                    <x-primary-button class="ms-3 my-5">
                        {{ __('auth_login') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>

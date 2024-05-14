<x-app-layout>
    <x-slot:title>
        {{ __('auth_reset_password') }}
    </x-slot>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div>
        <h2 class="flex flex-row flex-nowrap items-center mt-16 uppercase">
            <span class="flex-grow block border-t border-gray-700"></span>
            <span
                class="flex-none block mx-4 px-4 py-2.5 text-xl rounded leading-none font-medium bg-gray-700 text-white">
                {{ __('auth_reset_password') }}
            </span>
            <span class="flex-grow block border-t border-gray-700"></span>
        </h2>

        <div
            class="relative overflow-x-auto shadow-md sm:rounded-lg border-2 border-gray-700 bg-gray-300 mt-16 mb-6 sm:w-full md:w-1/2 lg:w-1/2 xl:w-[600px] mx-auto">


            <form method="POST" action="{{ route('password.email') }}" class="max-w-sm mx-auto mt-8 mb-8">
                @csrf

                <div class="mb-4 text-sm text-gray-600">
                    {{ __('auth_forgot_message') }}
                </div>

                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                        :value="old('email')" required autofocus />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-primary-button>
                        {{ __('auth_send_password_reset_link') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
</x-app-layout>

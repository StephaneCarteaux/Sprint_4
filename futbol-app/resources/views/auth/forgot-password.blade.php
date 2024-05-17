<x-app-layout>
    <x-slot:title>
        {{ __('Reset Password') }}
    </x-slot>

    <div>
        <x-header>
            <x-slot:title>
                {{ __('Register') }}
            </x-slot>
        </x-header>

        <x-form-container>
            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <div class="mb-4 text-sm text-gray-600">
                    {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                </div>

                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                        required autofocus />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Buttons container -->
                <div class="mt-6">

                    <div class="flex items-center justify-end mt-4">
                        <x-primary-button>
                            {{ __('Email Password Reset Link') }}
                        </x-primary-button>
                    </div>

                </div>
            </form>
        </x-form-container>
    </div>
</x-app-layout>

<x-app-layout>
    <x-slot:title>
        {{ __('Profile') }}
    </x-slot>

    <x-header>
        <x-slot:title>
            {{ __('Profile') }}
        </x-slot>
    </x-header>

    <div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <x-form-container>
                <div class="flex-col space-y-2">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </x-form-container>

            <x-form-container>
                <div class="flex-col space-y-2">
                    @include('profile.partials.update-password-form')
                </div>
            </x-form-container>

            <x-form-container>
                <div class="flex-col space-y-2">
                    @include('profile.partials.delete-user-form')
                </div>
            </x-form-container>
        </div>
    </div>
</x-app-layout>

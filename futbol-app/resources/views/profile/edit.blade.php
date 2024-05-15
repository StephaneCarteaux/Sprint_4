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
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg border-2 border-gray-700 bg-gray-300 mt-16 mb-6 sm:w-full md:w-1/2 lg:w-1/2 xl:w-[600px] mx-auto">
                <div class="max-w-sm mx-auto mt-8 mb-8">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="relative overflow-x-auto shadow-md sm:rounded-lg border-2 border-gray-700 bg-gray-300 mt-16 mb-6 sm:w-full md:w-1/2 lg:w-1/2 xl:w-[600px] mx-auto">
                <div class="max-w-sm mx-auto mt-8 mb-8">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="relative overflow-x-auto shadow-md sm:rounded-lg border-2 border-gray-700 bg-gray-300 mt-16 mb-6 sm:w-full md:w-1/2 lg:w-1/2 xl:w-[600px] mx-auto">
                <div class="max-w-sm mx-auto mt-8 mb-8">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

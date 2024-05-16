<x-app-layout>
    <x-slot:title>
        {{ __('team_create') }}
    </x-slot>
    <div>
        <x-header>
            <x-slot:title>
                {{ __('team_create') }}
            </x-slot>
        </x-header>

        <x-form-container>
            <form action="{{ route('teams.store') }}" method="post" enctype="multipart/form-data"
                class="max-w-sm mx-auto mt-8 mb-8">
                @csrf

                <!-- Input fields container -->
                <div class="flex-col space-y-2">

                    <!-- League Id -->
                    <input type="hidden" id="league_id" name="league_id" value="{{ $activeLeague->id }}">

                    <!-- Name -->
                    <div class="mb-5 px-3">
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" name="name" value="{{ old('name') }}" autofocus
                            class="w-full" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />

                    </div>

                    <!-- Logo -->
                    <div class="mb-5 px-3">
                        <x-input-label for="logo" :value="__('logo')" />
                        <input type="file" id="logo" name="logo"
                            class="border border-gray-400 bg-white text-sm rounded-lg block w-full p-2 h-10">
                        <x-input-error :messages="$errors->get('logo')" class="mt-2" />
                    </div>

                </div>

                <!-- Buttons container -->
                <div class="flex justify-center mt-6 space-x-6">

                    <!-- Return button -->
                    <x-secondary-button>
                        <a href="{{ route('teams.index') }}">{{ __('back') }}</a>
                    </x-secondary-button>

                    <!-- Send button -->
                    <x-primary-button class="ms-3">
                        {{ __('send') }}
                    </x-primary-button>
                </div>

            </form>
        </x-form-container>
    </div>
</x-app-layout>

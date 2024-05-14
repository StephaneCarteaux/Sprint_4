<x-app-layout>
    <x-slot:title>
        {{ __('team_edit') }}
    </x-slot>
    <div>
        <x-header>
            <x-slot:title>
                {{ __('team_edit') }}
            </x-slot>
        </x-header>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg border-2 border-gray-700 bg-gray-300 mt-16 mb-6 sm:w-full md:w-1/2 lg:w-1/3 xl:w-[600px] mx-auto">
            <form action="{{ route('teams.update', $team) }} " method="post" enctype="multipart/form-data" class="max-w-sm mx-auto mt-8 mb-8">
                @csrf
                @method('PATCH')

                <!-- Name -->
                <div class="mb-5 px-3">
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input type="text" id="name" name="name" value="{{ $team->name }}" autofocus class="w-full" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!--  Actual logo -->
                <div class="mb-5 px-3">
                    <x-input-label for="logo" :value="__('logo')" />
                    <img src="{{ asset('logos/' . $team->logo) }}" alt="{{ $team->name }}" width="48" height="48">
                </div>

                <!-- New logo -->
                <div class="mb-5 px-3">
                    <x-input-label for="logo" :value="__('new_logo')" />
                    <input type="file" id="logo" name="logo" class="border border-gray-700 bg-white text-sm rounded-lg block w-full p-2">
                    <x-input-error :messages="$errors->get('logo')" class="mt-2" />
                </div>

                <div class="flex justify-between mt-5 px-3">
                    <!-- Return button -->
                    <x-secondary-button>
                        <a href="{{ route('teams.index') }}">Volver</a>
                    </x-secondary-button>
                    
                    <!-- Send button -->
                    <x-primary-button class="ms-3">
                        {{ __('send') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>

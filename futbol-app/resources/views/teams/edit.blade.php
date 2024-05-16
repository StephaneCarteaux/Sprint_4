<x-app-layout>
    <x-slot:title>
        {{ __('team_edit') }}
    </x-slot>
    <div>
        <h2 class="flex flex-row flex-nowrap items-center mt-16 uppercase">
            <span class="flex-grow block border-t border-gray-700"></span>
            <span
                class="flex-none block mx-4 px-4 py-2.5 text-xl rounded leading-none font-medium bg-gray-700 text-white">
                Editar equipo
            </span>
            <span class="flex-grow block border-t border-gray-700"></span>
        </h2>

        <!-- Errors template -->
        <x-errors />

        <x-form-container>
            <form action="{{ route('teams.update', $team) }} " method="post" enctype="multipart/form-data"
                class="max-w-sm mx-auto mt-8 mb-8">
                @csrf
                @method('PATCH')

                <!-- Input fields container -->
                <div class="flex-col space-y-2">

                    <!-- Name -->
                    <div class="mb-5 px-3">
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input type="text" id="name" name="name" value="{{ $team->name }}" autofocus
                            class="w-full" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!--  Actual logo -->
                    <div class="mb-5 px-3">
                        <x-input-label for="logo" :value="__('logo')" />
                        <img src="{{ asset('logos/' . $team->logo) }}" alt="{{ $team->name }}" width="48"
                            height="48">
                    </div>

                    <!-- New logo -->
                    <div class="mb-5 px-3">
                        <x-input-label for="logo" :value="__('new_logo')" />
                        <input type="file" id="logo" name="logo"
                            class="border border-gray-700 bg-white text-sm rounded-lg block w-full p-2">
                        <x-input-error :messages="$errors->get('logo')" class="mt-2" />
                    </div>

                </div>

                <!-- Buttons container -->
                <div class="flex justify-center mt-6 space-x-6">

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
        </x-form-container>
    </div>
</x-app-layout>

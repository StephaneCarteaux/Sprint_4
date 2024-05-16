<x-app-layout>
    <x-slot:title>
        {{ __('league_edit') }}
    </x-slot>

    <div>
        <x-header>
            <x-slot:title>
                {{ __('league_edit') }}
            </x-slot>
        </x-header>

        <x-form-container>
            <form action="{{ route('leagues.update', $league) }} " method="post">
                @csrf
                @method('PATCH')

                <!-- Input fields container -->
                <div class="flex-col space-y-2">

                    <!-- Name -->
                    <div class="mb-5 px-3">
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" name="name" value="{{ $league->name }}" autofocus class="w-full" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                </div>

                <!-- Buttons container -->
                <div class="flex justify-center mt-6 space-x-6">

                    <!-- Return button -->
                    <x-secondary-button>
                        <a href="{{ route('leagues.index') }}">{{ __('back') }}</a>
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

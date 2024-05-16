<x-app-layout>
    <x-slot:title>
        {{ __('league_create') }}
    </x-slot>
    <div>
        <x-header>
            <x-slot:title>
                {{ __('league_create') }}
            </x-slot>
        </x-header>

        <x-form-container>
            <form action="{{ route('leagues.store') }}" method="post">
                @csrf

                <!-- Input fields container -->
                <div class="flex-col space-y-2">

                    <!-- Active -->
                    <input type="hidden" id="active" name="active" value="1">
                    <!-- Started -->
                    <input type="hidden" id="started" name="started" value="0">

                    <!-- Name -->
                    <div>
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" name="name" value="{{ old('name') }}" autofocus
                            class="w-full" />
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
                    <x-primary-button>
                        {{ __('send') }}
                    </x-primary-button>
                    
                </div>
            </form>
        </x-form-container>

    </div>
</x-app-layout>

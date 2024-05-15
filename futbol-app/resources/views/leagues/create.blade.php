<x-layout>
    <x-slot:title>
        Crear liga
    </x-slot>
    <div>
        <x-header>
            <x-slot:title>
                {{ __('league_create') }}
            </x-slot>
        </x-header>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg border-2 border-gray-700 bg-gray-300 mt-16 mb-6 sm:w-full md:w-1/2 lg:w-1/3 xl:w-[600px] mx-auto">
            <div class="py-8 px-24">

                <form action="{{ route('leagues.store') }}" method="post">
                    @csrf
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

                    <div class="flex justify-center mt-5 space-x-6">
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

            </div>
        </div>

    </div>
</x-layout>

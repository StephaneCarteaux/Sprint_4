<x-app-layout>
    <x-slot:title>
        {{ __('league_create') }}
    </x-slot>
    <div>
        <h2 class="flex flex-row flex-nowrap items-center mt-16 uppercase">
            <span class="flex-grow block border-t border-gray-700"></span>
            <span
                class="flex-none block mx-4 px-4 py-2.5 text-xl rounded leading-none font-medium bg-gray-700 text-white">
                {{ __('league_create_new') }}
            </span>
            <span class="flex-grow block border-t border-gray-700"></span>
        </h2>
        
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg border-2 border-gray-700 bg-gray-300 mt-16 mb-6 sm:w-full md:w-1/2 lg:w-1/3 xl:w-[600px] mx-auto">
            <form action="{{ route('leagues.store') }}" method="post" class="max-w-sm mx-auto mt-8 mb-8">
                @csrf
                <!-- Active -->
                <input type="hidden" id="active" name="active" value="1">
                <!-- Started -->
                <input type="hidden" id="started" name="started" value="0">

                <!-- Name -->
                <div class="mb-5 px-3">
                    <x-input-label for="name" :value="__('name') . ': '" />
                    <x-text-input id="name" name="name" value="{{ old('name') }}" autofocus class="w-full" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <div class="flex justify-between mt-5 px-3">
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
        </div>
    </div>
</x-app-layout>

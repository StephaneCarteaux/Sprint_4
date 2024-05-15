<x-layout>
    <x-slot:title>
        Editar liga
    </x-slot>

    <div>
        <h2 class="flex flex-row flex-nowrap items-center mt-16 uppercase">
            <span class="flex-grow block border-t border-gray-700"></span>
            <span
                class="flex-none block mx-4 px-4 py-2.5 text-xl rounded leading-none font-medium bg-gray-700 text-white">
                Editar liga
            </span>
            <span class="flex-grow block border-t border-gray-700"></span>
        </h2>

        <div
            class="relative overflow-x-auto shadow-md sm:rounded-lg border-2 border-gray-700 bg-gray-300 mt-16 mb-6 sm:w-full md:w-1/2 lg:w-1/3 xl:w-[600px] mx-auto">
            <div class="py-8 px-24">

                <form action="{{ route('leagues.update', $league) }} " method="post">
                    @csrf
                    @method('PATCH')

                    <!-- Name -->
                    <div>
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" name="name" value="{{ $league->name }}" autofocus class="w-full" />
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

</x-app-layout>

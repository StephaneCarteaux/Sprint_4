<x-app-layout>
    <x-slot:title>
        {{ __('league_title') }}
    </x-slot>

    <h2 class="flex flex-row flex-nowrap items-center mt-16 uppercase">
        <span class="flex-grow block border-t border-gray-700"></span>
        <span class="flex-none block mx-4 px-4 py-2.5 text-xl rounded leading-none font-medium bg-gray-700 text-white">
            {{ __('league_title') }}
        </span>
        <span class="flex-grow block border-t border-gray-700"></span>
    </h2>

    <div
        class="relative overflow-x-auto shadow-md sm:rounded-lg border-2 border-gray-700 mt-16 {{ $leagues->count() ? '' : 'invisible' }}">

        <table class="w-full text-sm text-left rtl:text-right">
            <thead class="text-xs text-white uppercase bg-gray-700">
                <tr>
                    <th class="px-6 py-3 min-w-40">{{ __('name') }}</th>
                    <th class="px-6 py-3 text-center">{{ __('league_start') }}</th>
                    <th class="px-6 py-3 text-center">{{ __('league_activate') }}</th>
                    <th class="px-6 py-3 text-center">{{ __('edit') }}</th>
                    <th class="px-6 py-3 text-center">{{ __('delete') }}</th>
                </tr>
            </thead>

            <tbody>

                @foreach ($leagues as $league)
                    <tr class="odd:bg-gray-100 even:bg-gray-200 border-t border-gray-400">

                        <!-- League name-->
                        <td class="px-6 py-4">
                            <div>
                                {{ $league->name }}
                            </div>
                        </td>

                        <!-- Start button-->
                        <td class="px-6 py-4">
                            <div class="flex justify-center">
                                <form action="{{ route('leagues.start', $league) }}" method="post" class="mb-0">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" id="started" name="started" value="1">
                                    <button type="submit" {{ $league->started ? 'disabled' : '' }}
                                        onclick="return confirm('{{ __('league_start_confirm', ['league_name' => $league->name]) }}')"
                                        class="{{ $league->started ? 'text-green-700 cursor-not-allowed' : 'text-gray-700 hover:text-green-700' }}">
                                        <i class="fa-solid fa-play fa-xl"
                                            title="{{ $league->started ? __('league_started') : __('league_start') }}"></i>
                                    </button>
                                </form>
                            </div>
                        </td>

                        <!-- Active button-->
                        <td class="px-6 py-4">
                            <div class="flex justify-center">
                                <form action="{{ route('leagues.activate', $league) }}" method="post" class="mb-0">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" id="active" name="active" value="1">
                                    <button type="submit" {{ $league->active ? 'disabled' : '' }}
                                        class="{{ $league->active ? 'text-green-700 cursor-not-allowed' : 'text-gray-700 hover:text-green-700' }}">
                                        <i class="fa-solid fa-eye fa-xl"
                                            title="{{ $league->active ? __('league_activated') : __('league_activate') }}"></i>
                                    </button>
                                </form>
                            </div>
                        </td>

                        <!-- Edit button-->
                        <td class="px-6 py-4">
                            <div class="flex justify-center">
                                <a href="{{ route('leagues.edit', $league) }}">
                                    <i class="fa-solid fa-pen-to-square fa-xl hover:text-green-700"
                                        title="{{ __('edit') }}"></i>
                                </a>
                            </div>

                        </td>

                        <!-- Delete button-->
                        <td class="px-6 py-4">
                            <div class="flex justify-center items-center">
                                <form action="{{ route('leagues.destroy', $league) }}" method="post" class="mb-0">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        onclick="return confirm('{{ __('league_delete', ['league_name' => $league->name]) }}')"
                                        class="hover:text-red-700">
                                        <i class="fa-solid fa-trash-can fa-xl" title="{{ __('delete') }}"></i>
                                    </button>
                                </form>
                            </div>
                        </td>

                    </tr>
                @endforeach

            </tbody>

        </table>

    </div>

    <!-- Create button -->
    @auth
        <div class="flex justify-center my-5">
            <x-secondary-button>
                <a href="{{ route('leagues.create') }}">{{ __('league_create') }}</a>
            </x-secondary-button>
        </div>
    @endauth

</x-app-layout>

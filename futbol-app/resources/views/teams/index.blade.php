<x-app-layout>
    <x-slot:title>
        {{ __('team_title') }}
    </x-slot>

    <x-header>
        <x-slot:title>
            {{ __('team_title') }}
        </x-slot>
    </x-header>

    <div
        class="relative overflow-x-auto shadow-md sm:rounded-lg border-2 border-gray-700 mt-16 {{ $teams->count() ? '' : 'invisible' }}">

        <table class="w-full text-sm text-left rtl:text-right">
            <thead class="text-xs text-white uppercase bg-gray-700">
                <tr>
                    <th class="px-6 py-3">Logo</th>
                    <th class="px-6 py-3 min-w-40">{{ __('name') }}</th>
                    <th class="px-6 py-3 text-center">{{ __('edit') }}</th>
                    <th class="px-6 py-3 text-center">{{ __('delete') }}</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($teams as $team)
                    <!-- Team logo-->
                    <tr class="odd:bg-gray-100 even:bg-gray-200 border-t border-gray-400">
                        <td class="px-6 py-4">
                            <div>
                                <img src="{{ asset('logos/' . $team->logo) }}" alt="{{ $team->name }}"
                                    style="width: 48px; height: 48px;">
                            </div>
                        </td>

                        <!-- Team name-->
                        <td class="px-6 py-4">
                            <div>
                                {{ $team->name }}
                            </div>
                        </td>

                        <!-- Edit button-->
                        <td class="px-6 py-4">
                            <div class="flex justify-center">
                                <a href="{{ route('teams.edit', $team) }}">
                                    <i class="fa-solid fa-pen-to-square fa-xl" title="{{ __('edit') }}"></i>
                                </a>
                            </div>
                        </td>

                        <!-- Delete button-->
                        <td class="px-6 py-4">
                            <div class="flex justify-center">
                                <form action="{{ route('teams.destroy', $team) }}" method="post" class="mb-0">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" {{ $team->league->started ? 'disabled' : '' }}
                                        onclick="return confirm('{{ __('team_delete', ['team_name' => $team->name]) }}')"
                                        class="py-2 px-4 {{ $team->league->started ? 'text-gray-400 cursor-not-allowed' : 'hover:text-red-700' }}">
                                        <i class="fa-solid fa-trash-can fa-xl"
                                            title="{{ $team->league->started ? __('league_started_cant_delete_team') : __('delete') }}"></i>
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
            @if ($getLeagues->count() > 0)
                <x-secondary-button>
                    <a href="{{ route('teams.create') }}">{{ __('team_create') }}</a>
                </x-secondary-button>
            @else
                <span
                    class="mx-4 mb-2 px-4 py-2.5 flex-none block border-2 border-gray-700 rounded leading-none font-medium">
                    {{ __('team_create_disabled') }}
                </span>
            @endif
        </div>
    @endauth
</x-app-layout>

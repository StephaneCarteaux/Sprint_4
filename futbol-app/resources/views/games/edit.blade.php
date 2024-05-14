<x-app-layout>
    <x-slot:title>
        {{ __('game_edit') }}
    </x-slot>
    <div>
        <h2 class="flex flex-row flex-nowrap items-center mt-16 uppercase">
            <span class="flex-grow block border-t border-gray-700"></span>
            <span
                class="flex-none block mx-4 px-4 py-2.5 text-xl rounded leading-none font-medium bg-gray-700 text-white">
                {{ __('game_edit') }}
            </span>
            <span class="flex-grow block border-t border-gray-700"></span>
        </h2>

        <!-- Errors template -->
        <x-errors />

        <div
            class="relative overflow-x-auto shadow-md sm:rounded-lg border-2 border-gray-700 bg-gray-300 mt-16 mb-6 sm:w-full md:w-1/2 lg:w-1/3 xl:w-[600px] mx-auto">
            <form action="{{ route('games.update', $game) }}" method="post" class="w-full max-w-sm mx-auto mt-8 mb-8">
                @csrf
                @method('PATCH')

                <!-- game info -->
                <div class="flex flex-wrap">

                    <!-- game_number -->
                    <div class="md:w-1/4 px-3 mb-5">
                        <x-input-label for="game_number" :value="__('game_matchweek') . ':'" />
                        <x-text-input type="text" id="game_number" name="game_number" value="{{ $game->game_number }}" autofocus class="w-full" />
                    </div>

                    <!-- date -->
                    <div class="w-full md:w-2/4 px-3 mb-5">
                        <x-input-label for="date" :value="__('date') . ':'" />
                        <input type="date" id="date" name="date"
                            class="border border-gray-700 text-sm rounded-lg block w-full pl-2 h-10"
                            value="{{ \Carbon\Carbon::parse($game->date)->format('Y-m-d') }}">
                    </div>
                </div>
                
                <!-- team 1-->
                <div class="flex flex-wrap">

                    <!-- team 1 name -->
                    <div class="w-full md:w-3/4 px-3 mb-5 relative">
                        <x-input-label for="team1_id" :value="__('game_team_local') . ':'" />
                        <select id="team1_id" name="team1_id"
                            class="border border-gray-700 appearance-none w-full text-sm rounded-lg p-2 h-10">
                            @foreach ($teams as $team)
                                <option value="{{ $team->id }}"
                                    {{ $team->id == $game->team1_id ? 'selected' : '' }}>{{ $team->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- team 1 goals -->
                    <div class="w-full md:w-1/4 px-3 mb-5">
                        <x-input-label for="team1_goals" :value="__('game_goals') . ':'" />
                        <x-text-input type="text" id="team1_goals" name="team1_goals" value="{{ $game->team1_goals }}" class="w-full" />
                    </div>
                </div>

                <!-- team 2 -->
                <div class="flex flex-wrap">

                    <!-- team 2 name -->
                    <div class="w-full md:w-3/4 px-3 mb-5 relative">
                        <x-input-label for="team2_id" :value="__('game_team_visitor') . ':'" />
                        <select id="team2_id" name="team2_id"
                            class="border border-gray-700 appearance-none w-full text-sm rounded-lg p-2 h-10">
                            @foreach ($teams as $team)
                                <option value="{{ $team->id }}"
                                    {{ $team->id == $game->team2_id ? 'selected' : '' }}>{{ $team->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- team 2 goals -->
                    <div class="w-full md:w-1/4 px-3 mb-5">
                        <x-input-label for="team2_goals" :value="__('game_goals') . ':'" />
                        <x-text-input type="text" id="team2_goals" name="team2_goals" value="{{ $game->team2_goals }}" class="w-full" />
                    </div>
                </div>

                <div class="flex justify-between mt-5 px-3">

                    <!-- Return button -->
                    <x-secondary-button>
                        <a href="{{ route('games.index') }}">{{ __('back') }}</a>
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

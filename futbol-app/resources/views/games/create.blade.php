<x-app-layout>
    <x-slot:title>
        {{ __('game_create') }}
    </x-slot>
    <div>
        <x-header>
            <x-slot:title>
                {{ __('game_create') }}
            </x-slot>
        </x-header>

        <x-form-container>
            <form action="{{ route('games.store') }}" method="post">
                @csrf

                <!-- Input fields container -->
                <div class="flex-col space-y-2">

                    <!-- league_id -->
                    <input type="hidden" id="league_id" name="league_id" value="{{ $activeLeague->id }}">

                    <!-- game info -->
                    <div class="flex flex-wrap">

                        <!-- game_number -->
                        <div class="md:w-1/4">
                            <x-input-label for="game_number" :value="__('game_matchweek')" />
                            <x-text-input id="game_number" name="game_number" value="{{ old('game_number') }}" autofocus
                                class="w-full" />
                            <x-input-error :messages="$errors->get('game_number', '*')" class="mt-2" />
                        </div>

                        <!-- date -->
                        <div class="w-full md:w-2/4 pl-4">
                            <x-input-label for="date" :value="__('date')" />
                            <input type="date" id="date" name="date" value="{{ old('date') }}"
                                class="border border-gray-700 text-sm rounded-lg block w-full pl-2 h-10">
                            <x-input-error :messages="$errors->get('date', '*')" class="mt-2" />
                        </div>
                    </div>

                    <!-- team 1-->
                    <div class="flex flex-wrap">

                        <!-- team 1 name -->
                        <div class="w-full md:w-3/4 relative">
                            <x-input-label for="team1_id" :value="__('game_team_local')" />
                            <select id="team1_id" name="team1_id"
                                class="border border-gray-700 appearance-none w-full text-sm rounded-lg p-2 h-10">
                                <option disabled="disabled" selected="selected">Seleciona...</option>
                                @foreach ($teams as $team)
                                    <option value="{{ $team->id }}"
                                        {{ old('team1_id') == $team->id ? 'selected' : '' }}>{{ $team->name }}
                                    </option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('team1_id')" class="mt-2" />
                        </div>

                        <!-- team 1 goals -->
                        <div class="w-full md:w-1/4 pl-4">
                            <x-input-label for="team1_goals" :value="__('game_goals')" />
                            <x-text-input id="team1_goals" name="team1_goals" value="{{ old('team1_goals') }}" autofocus
                                class="w-full" />
                            <x-input-error :messages="$errors->get('team1_goals', '*')" class="mt-2" />
                        </div>
                    </div>

                    <!-- team 2 -->
                    <div class="flex flex-wrap">

                        <!-- team 2 name -->
                        <div class="w-full md:w-3/4 relative">
                            <x-input-label for="team2_id" :value="__('game_team_visitor')" />
                            <select id="team2_id" name="team2_id"
                                class="border border-gray-700 appearance-none w-full text-sm rounded-lg p-2 h-10">
                                <option disabled="disabled" selected="selected">Seleciona...</option>
                                @foreach ($teams as $team)
                                    <option value="{{ $team->id }}"
                                        {{ old('team2_id') == $team->id ? 'selected' : '' }}>{{ $team->name }}
                                    </option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('team2_id')" class="mt-2" />
                        </div>

                        <!-- team 2 goals -->
                        <div class="w-full md:w-1/4 pl-4">
                            <x-input-label for="team2_goals" :value="__('game_goals')" />
                            <x-text-input id="team2_goals" name="team2_goals" value="{{ old('team2_goals') }}"
                                autofocus class="w-full" />
                            <x-input-error :messages="$errors->get('team2_goals', '*')" class="mt-2" />
                        </div>
                    </div>

                </div>

                <!-- Buttons container -->
                <div class="flex justify-center mt-6 space-x-6">

                    <!-- Return button -->
                    <x-secondary-button>
                        <a href="{{ route('games.index') }}">{{ __('back') }}</a>
                    </x-secondary-button>

                    <!-- Send button -->
                    <x-primary-button>
                        {{ __('send') }}
                    </x-primary-button>
                    
                </div>

            </form>
        </x-form-container>

</x-app-layout>

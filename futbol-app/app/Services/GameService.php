<?php

namespace App\Services;

use App\Models\Game;
use Illuminate\Support\Collection;

class GameService
{
    public function getGroupedGames(): Collection
    {
        // Eager load all games
        $games = Game::with('team1', 'team2')
            ->orderBy('game_number', 'asc')
            ->orderBy('date', 'asc')
            ->orderBy('id', 'asc')
            ->get();

        // Group games by game number
        return $this->groupGamesByGameNumber($games);
    }

    /**
     * Group games by game number.
     */
    private function groupGamesByGameNumber(Collection $games): Collection
    {
        return $games->groupBy('game_number');
    }
}


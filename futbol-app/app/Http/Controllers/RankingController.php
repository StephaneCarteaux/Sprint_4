<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Services\RankingService;

class RankingController extends Controller
{
    public function index(RankingService $rankingService)
    {
        // Get all games
        $games = Game::all();

        // Get team stats
        $teams = $rankingService->getRankingWithTeams($games);

        return view('ranking.index', ['teams' => $teams]);
    }
}

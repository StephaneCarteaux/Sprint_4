<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Team;
use App\Services\RankingTeamStatsService;
use App\Services\RankingSortingService;

class RankingController extends Controller
{
    protected $sorting;
    protected $teamStats;

    public function __construct(
        RankingTeamStatsService $rankingTeamStatsService,
        RankingSortingService $rankingSortingService
    ) {
        $this->teamStats = $rankingTeamStatsService;
        $this->sorting = $rankingSortingService;
    }

    public function index()
    {
        // Get all games
        $games = Game::all();

        // Get team stats
        $teamStats = $this->teamStats->getTeamStats($games);

        // Get ranking
        uasort($teamStats, [$this->sorting, 'getRanking']);

        // Get complete information based on calculated statistics
        $teams = [];
        foreach ($teamStats as $teamId => $stats) {
            $team = Team::find($teamId);
            if ($team) {
                $team->games_played = $stats['games_played'];
                $team->games_won = $stats['games_won'];
                $team->draws = $stats['draws'];
                $team->games_lost = $stats['games_lost'];
                $team->goals_scored = $stats['goals_scored'];
                $team->goals_conceded = $stats['goals_conceded'];
                $team->goals_difference = $stats['goals_difference'];
                $team->points = $stats['points'];
                $teams[] = $team;
            }
        }

        // Add ranking position
        $rankingPosition = 1;
        foreach ($teams as $team) {
            $team->ranking_position = $rankingPosition;
            $rankingPosition++;
        }

        return view('rankings.index', ['teams' => $teams]);
    }
}

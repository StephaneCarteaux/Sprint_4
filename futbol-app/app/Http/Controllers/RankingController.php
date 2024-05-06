<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Team;
use App\Models\Game;
use Illuminate\Database\Eloquent\Collection;
use App\Services\RankingService;

class RankingController extends Controller
{
    protected $rankingService;

    public function __construct(RankingService $rankingService)
    {
        $this->rankingService = $rankingService;
    }

    public function index()
    {
        // Get all games
        $games = Game::all();

        // Initialize an array to store the statistics of each team
        $teamStats = [];

        // Calculate statistics for each game
        foreach ($games as $game) {

            if (!isset($teamStats[$game->team1_id])) {
                $teamStats[$game->team1_id] = [
                    'games_played' => 0,
                    'games_won' => 0,
                    'draws' => 0,
                    'games_lost' => 0,
                    'goals_scored' => 0,
                    'goals_conceded' => 0,
                    'goals_difference' => 0,
                    'points' => 0,
                ];
            }

            if (!isset($teamStats[$game->team2_id])) {
                $teamStats[$game->team2_id] = [
                    'games_played' => 0,
                    'games_won' => 0,
                    'draws' => 0,
                    'games_lost' => 0,
                    'goals_scored' => 0,
                    'goals_conceded' => 0,
                    'goals_difference' => 0,
                    'points' => 0,
                ];
            }

            // Increase the number of games played for each team
            $teamStats[$game->team1_id]['games_played']++;
            $teamStats[$game->team2_id]['games_played']++;

            // Calculate game result and update win and loss statistics
            if ($game->team1_goals > $game->team2_goals) {
                $teamStats[$game->team1_id]['games_won']++;
                $teamStats[$game->team2_id]['games_lost']++;
            } elseif ($game->team1_goals < $game->team2_goals) {
                $teamStats[$game->team2_id]['games_won']++;
                $teamStats[$game->team1_id]['games_lost']++;
            } else {
                // In case of a draw, increase draws for both teams
                $teamStats[$game->team1_id]['draws']++;
                $teamStats[$game->team2_id]['draws']++;
            }

            // Increase the goals scored and conceded for each team
            $teamStats[$game->team1_id]['goals_scored'] += $game->team1_goals;
            $teamStats[$game->team2_id]['goals_scored'] += $game->team2_goals;
            $teamStats[$game->team1_id]['goals_conceded'] += $game->team2_goals;
            $teamStats[$game->team2_id]['goals_conceded'] += $game->team1_goals;

            // Calculate the goal difference for each team
            $teamStats[$game->team1_id]['goals_difference'] = $teamStats[$game->team1_id]['goals_scored'] - $teamStats[$game->team1_id]['goals_conceded'];
            $teamStats[$game->team2_id]['goals_difference'] = $teamStats[$game->team2_id]['goals_scored'] - $teamStats[$game->team2_id]['goals_conceded'];
        }

        // Calculate points for each team
        foreach ($teamStats as $teamId => $stats) {
            $teamStats[$teamId]['points'] = $stats['games_won'] * 3 + $stats['draws'];
        }

        // Sort teams by points
        // uasort($teamStats, function ($a, $b) {
        //     return $b['points'] - $a['points'];
        // });

        // Get ranking
        uasort($teamStats, [$this->rankingService, 'getRanking']);


        // Get complete information based on calculated statistics
        $teams = [];
        foreach ($teamStats as $teamId => $stats) {
            $team = \App\Models\Team::find($teamId);
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

        return view('rankings.index', compact('teams'));
    }
}

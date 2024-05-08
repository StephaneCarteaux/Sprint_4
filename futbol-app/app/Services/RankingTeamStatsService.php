<?php

namespace App\Services;

class RankingTeamStatsService
{
    function getTeamStats($games): array
    {
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

        return $teamStats;
    }
    
}

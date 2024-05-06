<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $games = [
            [
                'league_id' => 1,
                'team1_id' => 2,
                'team2_id' => 1,
                'game_number' => 1,
                'date' => '2024-04-27 00:00:00',
                'team1_goals' => 4,
                'team2_goals' => 2
            ],
            [
                'league_id' => 1,
                'team1_id' => 3,
                'team2_id' => 4,
                'game_number' => 1,
                'date' => '2024-04-27 00:00:00',
                'team1_goals' => 2,
                'team2_goals' => 3
            ],
            [
                'league_id' => 1,
                'team1_id' => 1,
                'team2_id' => 3,
                'game_number' => 4,
                'date' => '2024-04-27 00:00:00',
                'team1_goals' => 3,
                'team2_goals' => 1
            ],
            [
                'league_id' => 1,
                'team1_id' => 2,
                'team2_id' => 4,
                'game_number' => 2,
                'date' => '2024-04-27 00:00:00',
                'team1_goals' => 2,
                'team2_goals' => 2
            ],
            
        ];

        DB::table('games')->insert($games);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LeagueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $leagues = [
            [
                'name' => 'Primera división',
                'started' => true,
                'active' => true
            ],
            [
                'name' => 'Segunda división',
                'started' => false,
                'active' => false
            ],
        ];

        DB::table('leagues')->insert($leagues);

    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $teams = [
            [
                'league_id' => 1,
                'name' => 'Barcelona',
                'logo' => '1hV32jvrURJlKa3oKPJoCIuZfBpUC12UzQOx9Zml.png'
            ],
            [
                'league_id' => 1,
                'name' => 'Girona',
                'logo' => 'C89OkRgIUwK6MCt5SxsPD2pYWe9OIEf7JB75AeNC.png'
            ],
            [
                'league_id' => 1,
                'name' => 'Athletic',
                'logo' => '7M9h8ZnXoF3zSkx8a3k0Ap9VDYrLzfkNdiNLCoss.png'
            ],
            [
                'league_id' => 1,
                'name' => 'Real Madrid',
                'logo' => 'ZGBFijbLDAeJtLDShsbRxgoMf8mXRls0R5o5ankh.png'
            ],
            [
                'league_id' => 2,
                'name' => 'Alavés',
                'logo' => 'MlWczUVUZ6j1c3N5R0CSaIukMc1aFGAyek89KGLc.png'
            ],
            [
                'league_id' => 2,
                'name' => 'Almería',
                'logo' => 'dc0MpKRwrAhvARDsGA7GDr0oPBI3lDjXWZlWxpbM.png'
            ],
            [
                'league_id' => 2,
                'name' => 'Betis',
                'logo' => 'mMRHA8Oysf5ST7TQyk1a8xVdZKxAZSNGlQRpqfkw.png'
            ],
            [
                'league_id' => 2,
                'name' => 'Cádiz',
                'logo' => 'DguzdOiql72r9PodU0ZJw6dNPt5Rehmx3aagUMFI.png'
            ],
            
        ];

        DB::table('teams')->insert($teams);
    }
}

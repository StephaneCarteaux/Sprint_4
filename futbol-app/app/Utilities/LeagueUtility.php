<?php

namespace App\Utilities;

use App\Models\League;

class LeagueUtility
{
    public static function getActiveLeague()
    {
        $activeLeague = League::where('active', 1)->first();
        return $activeLeague;
    }
}

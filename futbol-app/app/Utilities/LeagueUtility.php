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

    public static function getStartedLeagues()
    {
        $startedLeagues = League::where('started', 1)->get();
        return $startedLeagues;
    }

    public static function getLeagues()
    {
        $leagues = League::all();
        return $leagues;
    }
}

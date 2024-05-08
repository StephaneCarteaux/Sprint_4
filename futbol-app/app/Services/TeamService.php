<?php

namespace App\Services;

use App\Utilities\LeagueUtility;
use App\Models\Team;

class TeamService
{
    public function getTeamsForActiveLeague(): Team
    {
        $activeLeague = LeagueUtility::getActiveLeague();
        $teams = Team::where('league_id', $activeLeague->id)->get();
        return $teams;
    }
}

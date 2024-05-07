<?php

namespace App\Services;

use App\Utilities\LeagueUtility;

class LeagueService
{
    public function activeLeagueIsStarted()
    {
        $activeLeague = LeagueUtility::getActiveLeague();
        $startedLeagues = LeagueUtility::getStartedLeagues();

        // Check if the active league is in the list of started leagues
        $activeLeagueIsStarted = $startedLeagues->contains($activeLeague);
        
        return $activeLeagueIsStarted;
    }

    public function getLeagues()
    {
        $leagues = LeagueUtility::getLeagues();
        return $leagues;
    }
}

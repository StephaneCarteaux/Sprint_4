<?php

namespace App\Services;

use App\Utilities\LeagueUtility;
use Illuminate\Database\Eloquent\Collection;

class LeagueService
{
    public function activeLeagueIsStarted(): bool
    {
        $activeLeague = LeagueUtility::getActiveLeague();
        $startedLeagues = LeagueUtility::getStartedLeagues();

        // Check if the active league is in the list of started leagues
        $activeLeagueIsStarted = $startedLeagues->contains($activeLeague);
        
        return $activeLeagueIsStarted;
    }

    public function getLeagues(): Collection
    {
        $leagues = LeagueUtility::getLeagues();
        return $leagues;
    }
}

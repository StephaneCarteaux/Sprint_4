<?php

namespace App\Services;

class RankingSortingService
{
    // Sort teams by points, goal difference and goals scored
    function getRanking($a, $b): int
    {
        $ranking = $this->compareByPoints($a, $b);
        if ($ranking == 0) {
            $ranking = $this->compareByGoalDifference($a, $b);
            if ($ranking == 0) {
                $ranking = $this->compareByGoalsScored($a, $b);
            }
        }
        return $ranking;
    }
    // Sort teams by points
    function compareByPoints($a, $b): int
    {
        return $b['points'] - $a['points'];
    }

    // Sort teams by goal difference
    function compareByGoalDifference($a, $b): int
    {
        return $b['goals_difference'] - $a['goals_difference'];
    }

    // Sort teams by goals scored
    function compareByGoalsScored($a, $b): int
    {
        return $b['goals_scored'] - $a['goals_scored'];
    }
}

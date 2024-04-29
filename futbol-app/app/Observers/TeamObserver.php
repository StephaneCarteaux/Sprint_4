<?php

namespace App\Observers;

use App\Models\Team;

class TeamObserver
{
    // Handle the Team "deleting" event.
    public function deleting(Team $team)
    {
            if ($team->league->started == 1) {
                throw new \Exception('No se puede eliminar equipos una vez la liga ha comenzado.');
                return false;
            }
    }
}

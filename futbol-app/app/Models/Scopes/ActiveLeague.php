<?php

namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use App\Models\League;

class ActiveLeague implements Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     */
    public function apply(Builder $builder, Model $model): void
    {
        $activeLeague = League::where('active', '=', true)->first();
        if($activeLeague){
            $builder->where('league_id', '=', $activeLeague->id);
        }
    }
}

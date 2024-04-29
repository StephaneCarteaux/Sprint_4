<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use App\Observers\TeamObserver;
use App\Models\Scopes\ActiveLeague;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;

// use App\Models\Scopes\ActiveLeague to restrict to active league
#[ScopedBy([ActiveLeague::class])]
#[ObservedBy([TeamObserver::class])]

class Team extends Model
{
    protected $table = 'teams';

    protected $fillable = [
        'league_id',
        'logo',
        'name'
    ];

    //Get the league that owns the game.
    public function league(): BelongsTo
    {
        return $this->belongsTo(League::class);
    }
}

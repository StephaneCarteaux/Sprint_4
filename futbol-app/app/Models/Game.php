<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use App\Models\Scopes\ActiveLeague;


#[ScopedBy([ActiveLeague::class])]
class Game extends Model
{
    protected $table = 'games';

    protected $fillable = [
        'league_id',
        'team1_id',
        'team2_id',
        'game_number',
        'date',
        'team1_goals',
        'team2_goals'
    ];

    //Get the team that owns the game.
    public function team1(): BelongsTo
    {
        return $this->belongsTo(Team::class);
    }

    //Get the team that owns the game.
    public function team2(): BelongsTo
    {
        return $this->belongsTo(Team::class);
    }

    //Get the league that owns the game.
    public function league(): BelongsTo
    {
        return $this->belongsTo(League::class);
    }
}

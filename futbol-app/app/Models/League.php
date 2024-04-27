<?php

namespace App\Models;

use App\Events\LeagueSaved;
use App\Events\LeagueDeleted;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class League extends Model
{
    protected $table = 'leagues';

    protected $fillable = [
        'name',
        'active',
        'started'
    ];

    // The booted method is listening to the saving event
    // and sets the active field to 0 if the league is not active
    protected static function booted()
    {
        // Listen to the saving event
        // If saved model is set to active, set all other models to 0
        static::saving(function (League $league) {
            if ($league->active == 1) {
                self::where('id', '!=', $league->id)->update(['active' => 0]);
            }
        });

        // Listen to the deleting event
        // If deleted model is set to active, set first model to 1
        static::deleting(function (League $league) {
            if ($league->active == 1) {
                $firstLeague = self::where('id', '!=', $league->id)->first();
                if($firstLeague) {
                    self::where('id', '!=', $league->id)->first()->update(['active' => 1]);
                }
                
            }
        });
    }
}

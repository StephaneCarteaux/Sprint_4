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
        static::saving(function (League $league) {
            echo 'saved';
            if ($league->active == 1) {
                self::where('id', '!=', $league->id)->update(['active' => 0]);
            }
        });
    }
}

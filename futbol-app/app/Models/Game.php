<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use App\Models\Scopes\ActiveLeague;


#[ScopedBy([ActiveLeague::class])]
class Game extends Model
{
    use HasFactory;

    public function team(): HasOne
    {
        return $this->hasOne(Team::class);
    }

    public function league(): HasOne
    {
        return $this->hasOne(League::class);
    }

}

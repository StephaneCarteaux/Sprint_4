<?php

namespace App\Models;

use App\Models\Scopes\ActiveLeague;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;

// use App\Models\Scopes\ActiveLeague to restrict to active league
#[ScopedBy([ActiveLeague::class])]
class Team extends Model
{
    protected $table = 'teams';

    protected $fillable = [
        'league_id',
        'logo',
        'name'
    ];
}

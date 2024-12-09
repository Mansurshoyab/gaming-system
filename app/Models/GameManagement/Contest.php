<?php

namespace App\Models\GameManagement;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contest extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'member_id',
        'game_id',
        'start',
        'end',
    ];


    public function bets(): HasMany
    {
        return $this->hasMany(Bet::class, 'match_id', 'id')->withTrashed();
    }
}

<?php

namespace App\Models\GameManagement;

use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    protected $fillable = [
        'member_id',
        'game_id',
        'matches',
        'rounds',
        'bets',
        'wins',
        'losses',
        'total_bet',
        'total_payout',
    ]; 

    protected function casts() :array 
    {
        return [
            'deleted_at' => 'datetime',
        ];
    }
}


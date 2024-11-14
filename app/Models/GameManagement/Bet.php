<?php

namespace App\Models\GameManagement;

use Illuminate\Database\Eloquent\Model;

class Bet extends Model
{
    protected $fillable = [
        'member_id',
        'match_id',
        'round_id',
        'amount',
        'payout',
        'status',
    ];

    protected function casts() :array 
    {
        return [
            'status' => 'string',
            'deleted_at' => 'datetime',
        ];
    }
}

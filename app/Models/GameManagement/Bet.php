<?php

namespace App\Models\GameManagement;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bet extends Model
{

    use SoftDeletes;

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

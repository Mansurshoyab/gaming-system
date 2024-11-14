<?php

namespace App\Models\GameManagement;

use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
    protected $fillable = [
        'member_id',
        'game_id',
        'start',
        'end',
    ];
}

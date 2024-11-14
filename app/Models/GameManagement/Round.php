<?php

namespace App\Models\GameManagement;

use Illuminate\Database\Eloquent\Model;

class Round extends Model
{
    protected $fillable = [
        'member_id',
        'match_id',
        'start',
        'end',
    ];

    protected function casts() :array 
    {
        return [
            'deleted_at' => 'datetime',
        ];
    }

}

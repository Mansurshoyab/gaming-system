<?php

namespace App\Models\Miscellaneous;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = [
        'user_id',
        'member_id',
        'title',
        'description',
    ];

    protected function casts() :array 
    {
        return [
            'deleted_at' => 'datetime',
        ];
    }
}

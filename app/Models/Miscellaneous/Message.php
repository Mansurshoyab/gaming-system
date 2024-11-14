<?php

namespace App\Models\Miscellaneous;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'user_id',
        'member_id',
        'ticket_id',
        'content',
        'read',
    ];

    protected function casts() :array 
    {
        return [
            'deleted_at' => 'datetime',
        ];
    }

}

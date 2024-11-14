<?php

namespace App\Models\Miscellaneous;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = [
        'user_id',
        'member_id',
        'icon',
        'title',
        'description',
        'type',
        'read',
    ];


    protected function casts() :array 
    {
        return [
            'type' => 'string',
            'deleted_at' => 'datetime',
        ];
    }
}

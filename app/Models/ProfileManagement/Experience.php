<?php

namespace App\Models\ProfileManagement;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    protected $fillable = [
        'member_id',
        'level',
        'needed',
        'current',
    ];

    protected function casts() :array 
    {
        return [
            'deleted_at' => 'datetime',
        ];
    }
}

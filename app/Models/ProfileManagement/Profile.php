<?php

namespace App\Models\ProfileManagement;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable =[
        'user_id',
        'member_id',
        'avatar_id',
        'biography',
        'motto',
        'dob',
        'gender',
        'religion',
        'marital',
    ];

    protected function casts() :array 
    {
        return [
            'gender' => 'string',
            'religion' => 'string',
            'marital' => 'string',
            'deleted_at' => 'datetime',
        ];
    }
}


<?php

namespace App\Models\ProfileManagement;

use Illuminate\Database\Eloquent\Model;

class Avatar extends Model
{
    protected $fillable = [
        'image',
        'title',
        'note',
        'gender',
        'status',
    ];

    protected function casts() :array 
    {
        return [
            'gender' => 'string',
            'status' => 'string',
            'deleted_at' => 'datetime',
        ];
    }
}

<?php

namespace App\Models\SystemConfiguration;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    protected $fillable =[
            'icon',
            'title',
            'description',
            'slug',
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

<?php

namespace App\Models\SystemConfiguration;

use Illuminate\Database\Eloquent\Model;

class System extends Model
{
    protected $fillable = [
        'informations',
        'variables',
        'badges',
        'highlights',
        'introduction',
        'about',
        'services',
        'technology',
        'features',
        'backend',
        'frontend',
        'prerequisites',
        'license',
    ];

    protected function casts() :array 
    {
        return [
            'informations' => 'json',
            'variables' => 'json',
            'badges' => 'json',
            'highlights' => 'json',
            'about' => 'json',
            'services' => 'json',
            'technology' => 'json',
            'features' => 'json',
            'prerequisites' => 'json',
            'deleted_at' => 'datetime',
        ];
    }
}

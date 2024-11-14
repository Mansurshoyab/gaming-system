<?php

namespace App\Models\ProfileManagement;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = [
        'user_id',
        'member_id',
        'country_id',
        'province_id',
        'city_id',
        'timezone',
        'address',
    ];

    protected function casts() :array 
    {
        return [
            'deleted_at' => 'datetime',
        ];
    }
}

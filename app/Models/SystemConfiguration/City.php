<?php

namespace App\Models\SystemConfiguration;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable =[
        'country_id',
        'province_id',
        'name',
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

<?php

namespace App\Models\SystemConfiguration;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $fillable =[
        'country_id',
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

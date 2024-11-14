<?php

namespace App\Models\ProfileManagement;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $fillable = [
        'user_id',
        'member_id',
        'ip_address',
        'device_type',
        'browser',
        'browser_version',
        'operating_system',
        'latitude',
        'longitude',
        'country',
        'city',
        'region',
        'zip_code',
        'login_at',
        'logout_at',
        'session_duration',
        'network_type',
        'is_touch_device',
        'login_method',
        'additional_data',
    ];

    protected function casts() :array 
    {
        return [
            'additional_data' => 'json',
            'deleted_at' => 'datetime',
        ];
    }

}

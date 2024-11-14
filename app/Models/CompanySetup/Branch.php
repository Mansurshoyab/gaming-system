<?php

namespace App\Models\CompanySetup;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model 
{
    protected $fillable = [
        'company_id',
        'name',
        'estd_date',
        'email',
        'phone',
        'hotline',
        'timezone',
        'opening_time',
        'closing_time',
        'address',
        'social_media'
    ];

    protected function casts(): array
    {
        return [
            'address' => 'json',
            'social_media' => 'json',
            'deleted_at' => 'datetime',
        ];
    }
}

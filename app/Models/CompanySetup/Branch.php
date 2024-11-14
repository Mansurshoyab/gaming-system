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
        'opening_time',
        'closing_time',
        'address',
        'social_media',
        'status'
    ];

    protected function casts(): array
    {
        return [
            'address' => 'json',
            'social_media' => 'json',
            'status' => 'string',
            'deleted_at' => 'datetime',
        ];
    }
}

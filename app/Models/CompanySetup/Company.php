<?php

namespace App\Models\CompanySetup;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'name',
        'tagline',
        'description',
        'estd_date',
        'email',
        'phone',
        'hotline',
        'logo',
        'favicon',
        'screenshot',
        'social_media',
    ];

    protected function casts(): array
    {
        return [
            'social_media' => 'json',
            'deleted_at' => 'datetime',
        ];
    }
}

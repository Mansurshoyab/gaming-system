<?php

namespace App\Models\UserManagement;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;

class Member extends Model
{
    use HasApiTokens, SoftDeletes;

    protected $fillable = [
        'firstname',
        'lastname',
        'username',
        'email',
        'email_verified_at',
        'phone',
        'phone_verified_at',
        'otp_code',
        'otp_verified_at',
        'password',
        'status',
        'verified',
        'source',

    ];

    protected function casts(): array
    {
        return [
            'source' => 'string',
            'status' => 'string',
            'deleted_at' => 'datetime',
        ];
    }
}

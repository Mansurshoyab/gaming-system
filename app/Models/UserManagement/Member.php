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
        'phone',
        'otp_code',
        'password',
        'status',
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

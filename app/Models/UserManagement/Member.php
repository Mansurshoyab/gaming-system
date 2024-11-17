<?php

namespace App\Models\UserManagement;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Member extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, SoftDeletes, HasApiTokens;

    protected $fillable = [ 'firstname', 'lastname', 'username', 'email', 'phone', 'otp_code', 'password', 'status' ];

    protected function casts(): array
    {
        return [
            'source' => 'string',
            'status' => 'string',
            'deleted_at' => 'datetime',
        ];
    }
}

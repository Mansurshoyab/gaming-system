<?php

namespace App\Models\UserManagement;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable =[
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

    protected function casts() :array 
    {
        return [
            'source' => 'string',
            'status' => 'string',
            'deleted_at' => 'datetime',
        ];
    }
}

<?php

namespace App\Models\UserManagement;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable = [
        'guard',
        'role_id',
        'navigation_id',
    ]; 

    protected function casts() :array 
    {
        return [
            'deleted_at' => 'datetime',
        ];
    }
}

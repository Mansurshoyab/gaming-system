<?php

namespace App\Models\ProfileManagement;

use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    protected $fillable =[
        'member_id',
        'amount',
    ];

    protected function casts() :array 
    {
        return [
            'deleted_at' => 'datetime',
        ];
    }
}

<?php

namespace App\Models\FinanceManagement;

use Illuminate\Database\Eloquent\Model;

class Withdraw extends Model
{
    protected $fillable = [
        'member_id',
        'account_id',
        'trx_id',
        'amount',
        'status',
        'note',
    ];

    protected function casts() :array 
    {
        return [
            'status' => 'string',
            'deleted_at' => 'datetime',
        ];
    }
}

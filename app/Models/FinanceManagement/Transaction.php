<?php

namespace App\Models\FinanceManagement;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'user_id',
        'member_id',
        'account_id',
        'trx_id',
        'type',
        'debit',
        'credit',
        'amount',
        'note',
    ];

    protected function casts() :array 
    {
        return [
            'type' => 'string',
            'deleted_at' => 'datetime',
        ];
    }
}

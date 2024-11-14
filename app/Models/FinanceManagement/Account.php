<?php

namespace App\Models\FinanceManagement;

use Illuminate\Database\Eloquent\Model;

class Account extends Model 
{
    protected $fillable = [
        'acc_name',
        'acc_code',
        'acc_no',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'status' => 'string',
            'deleted_at' => 'datetime',
        ];
    }
}

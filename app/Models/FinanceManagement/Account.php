<?php

namespace App\Models\FinanceManagement;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Account extends Model
{
    use SoftDeletes;

    protected $fillable = [ 'acc_name', 'acc_code', 'acc_no', 'status' ];

    protected function casts(): array
    {
        return [
            'status' => 'string',
            'deleted_at' => 'datetime',
        ];
    }
}

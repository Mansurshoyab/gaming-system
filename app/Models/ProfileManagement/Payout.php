<?php

namespace App\Models\ProfileManagement;

use App\Models\FinanceManagement\Account;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Payout extends Model
{
    protected $fillable = [
        'member_id',
        'account_id',
        'account_no',
        'status',
    ];

    protected function casts() :array 
    {
        return [
            'status' => 'string',
            'deleted_at' => 'datetime',
        ];
    }

    public function account(): BelongsTo {
        return $this->belongsTo(Account::class, 'account_id' , 'id')->withTrashed();
    }
}

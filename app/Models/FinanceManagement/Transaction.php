<?php

namespace App\Models\FinanceManagement;

use App\Models\UserManagement\Member;
use App\Models\UserManagement\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use SoftDeletes;

    protected $fillable = [ 'user_id', 'member_id', 'account_id', 'trx_id', 'type', 'debit', 'credit', 'amount', 'note' ];

    protected function casts() :array
    {
        return [
            'type' => 'string',
            'deleted_at' => 'datetime',
        ];
    }

    public function user(): BelongsTo {
        return $this->belongsTo(User::class, 'user_id', 'id')->withTrashed();
    }

    public function member(): BelongsTo {
        return $this->belongsTo(Member::class, 'member_id', 'id')->withTrashed();
    }

    public function account(): BelongsTo {
        return $this->belongsTo(Account::class, 'account_id', 'id')->withTrashed();
    }
}

<?php

namespace App\Models\FinanceManagement;

use App\Models\UserManagement\Member;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Deposit extends Model
{
    use SoftDeletes;

    protected $fillable = [ 'member_id', 'account_id', 'trx_id', 'amount', 'status', 'note' ];

    protected function casts() :array
    {
        return [
            'status' => 'string',
            'deleted_at' => 'datetime',
        ];
    }

    public function member(): BelongsTo {
        return $this->belongsTo(Member::class, 'member_id', 'id')->withTrashed();
    }

    public function method(): BelongsTo {
        return $this->belongsTo(Account::class, 'account_id', 'id')->withTrashed();
    }
}

<?php

namespace App\Models\FinanceManagement;

use App\Models\ProfileManagement\Payout;
use App\Models\UserManagement\Member;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
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

    public function payouts(): HasMany {
        return $this->hasMany(Payout::class, 'account_id', 'id')->withTrashed();
    }

    public function deposits(): HasMany {
        return $this->hasMany(Deposit::class, 'account_id', 'id')->withTrashed();
    }

    public function withdraws(): HasMany {
        return $this->hasMany(Withdraw::class, 'account_id', 'id')->withTrashed();
    }

    public function transactions(): HasMany {
        return $this->hasMany(Transaction::class, 'account_id', 'id')->withTrashed();
    }
}

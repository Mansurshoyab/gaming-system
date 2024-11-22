<?php

namespace App\Models\ProfileManagement;

use App\Models\UserManagement\Member;
use App\Models\UserManagement\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Profile extends Model
{
    use SoftDeletes;

    protected $fillable =[ 'user_id', 'member_id', 'avatar_id', 'biography', 'motto', 'dob', 'gender', 'religion', 'marital' ];

    protected function casts() :array
    {
        return [
            'gender' => 'string',
            'religion' => 'string',
            'marital' => 'string',
            'deleted_at' => 'datetime',
        ];
    }

    public function user(): BelongsTo {
        return $this->belongsTo(User::class, 'user_id', 'id')->withTrashed();
    }

    public function member(): BelongsTo {
        return $this->belongsTo(Member::class, 'member_id', 'id')->withTrashed();
    }
}


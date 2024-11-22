<?php

namespace App\Models\UserManagement;

use App\Models\ProfileManagement\Activity;
use App\Models\ProfileManagement\Location;
use App\Models\ProfileManagement\Profile;
use App\Models\ProfileManagement\Wallet;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Member extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, SoftDeletes, HasApiTokens;

    protected $fillable = [ 'firstname', 'lastname', 'username', 'email', 'phone', 'otp_code', 'password', 'status' ];

    protected function casts(): array
    {
        return [
            'source' => 'string',
            'status' => 'string',
            'deleted_at' => 'datetime',
        ];
    }

    /**
     * Define an one-to-one relationship with the Profile model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function profile(): HasOne {
        return $this->hasOne(Profile::class, 'member_id', 'id')->withTrashed();
    }

    /**
     * Define an one-to-many relationship with the Activity model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function activities(): HasMany {
        return $this->hasMany(Activity::class, 'member_id', 'id')->withTrashed();
    }

    /**
     * Define an one-to-one relationship with the Wallet model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function wallet(): HasOne {
        return $this->hasOne(Wallet::class, 'member_id', 'id')->withTrashed();
    }

    /**
     * Define an one-to-one relationship with the Location model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function location(): HasOne {
        return $this->hasOne(Location::class, 'member_id', 'id')->withTrashed();
    }
}

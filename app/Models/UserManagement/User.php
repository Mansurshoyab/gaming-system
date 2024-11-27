<?php

namespace App\Models\UserManagement;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Models\ProfileManagement\Activity;
use App\Models\ProfileManagement\Location;
use App\Models\ProfileManagement\Profile;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['firstname', 'lastname', 'username', 'email', 'phone', 'otp_code', 'password', 'role_id', 'status'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = ['otp_code', 'password', 'verified', 'source', 'remember_token'];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'phone_verified_at' => 'datetime',
            'otp_verified_at' => 'datetime',
            'password' => 'hashed',
            'status' => 'string',
            'source' => 'string',
            'deleted_at' => 'datetime',
        ];
    }

    /**
     * Define an inverse one-to-many relationship with the Role model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class, 'role_id', 'id')->withTrashed();
    }

    /**
     * Define an one-to-one relationship with the Profile model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function profile(): HasOne
    {
        return $this->hasOne(Profile::class, 'user_id', 'id')->withTrashed();
    }

    /**
     * Define an one-to-many relationship with the Activity model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function activities(): HasMany
    {
        return $this->hasMany(Activity::class, 'user_id', 'id')->withTrashed();
    }

    /**
     * Define an one-to-one relationship with the Location model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function location(): HasOne
    {
        return $this->hasOne(Location::class, 'user_id', 'id')->withTrashed();
    }
}

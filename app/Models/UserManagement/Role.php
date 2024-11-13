<?php

namespace App\Models\UserManagement;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{

    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [ 'title', 'description', 'slug', 'status' ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'status' => 'string',
            'deleted_at' => 'datetime',
        ];
    }

    /**
     * Define a one-to-many relationship with the Permission model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function permissions(): HasMany {
        return $this->hasMany(Permission::class, 'role_id', 'id')->withTrashed();
    }

    /**
     * Define a one-to-many relationship with the User model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users(): HasMany {
        return $this->hasMany(User::class, 'role_id', 'id')->withTrashed();
    }
}

<?php

namespace App\Models\SystemConfiguration;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Country extends Model
{
    use SoftDeletes;

    protected $fillable =[ 'name', 'iso3', 'iso2', 'phone_code', 'status' ];

    protected function casts() :array
    {
        return [
            'status' => 'string',
            'deleted_at' => 'datetime',
        ];
    }

    public function provinces(): HasMany {
        return $this->hasMany(Province::class, 'country_id', 'id')->withTrashed();
    }

    public function cities(): HasMany {
        return $this->hasMany(City::class, 'country_id', 'id')->withTrashed();
    }
}

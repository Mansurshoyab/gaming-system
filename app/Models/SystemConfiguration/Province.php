<?php

namespace App\Models\SystemConfiguration;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Province extends Model
{
    use SoftDeletes;

    protected $fillable =[ 'country_id', 'name', 'status' ];

    protected function casts() :array
    {
        return [
            'status' => 'string',
            'deleted_at' => 'datetime',
        ];
    }

    public function country(): BelongsTo {
        return $this->belongsTo(Country::class, 'country_id', 'id')->withTrashed();
    }

    public function cities(): HasMany {
        return $this->hasMany(City::class, 'province_id', 'id')->withTrashed();
    }
}

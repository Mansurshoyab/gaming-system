<?php

namespace App\Models\SystemConfiguration;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model
{
    use SoftDeletes;

    protected $fillable =[ 'country_id', 'province_id', 'name', 'status' ];

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

    public function province(): BelongsTo {
        return $this->belongsTo(Province::class, 'province_id', 'id')->withTrashed();
    }
}

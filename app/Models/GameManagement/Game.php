<?php

namespace App\Models\GameManagement;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Game extends Model
{
    use SoftDeletes;

    protected $fillable = ['genre_id', 'name', 'description', 'thumbnail', 'slug', 'status'];

    protected function casts(): array
    {
        return [
            'status' => 'string',
            'deleted_at' => 'datetime',
        ];
    }

    public function genre(): BelongsTo
    {
        return $this->belongsTo(Genre::class, 'genre_id', 'id')->withTrashed();
    }

    public function contests(): HasMany
    {
        return $this->hasMany(Contest::class, 'game_id', 'id')->withTrashed();
    }
}

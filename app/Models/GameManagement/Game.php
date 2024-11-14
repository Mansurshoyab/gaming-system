<?php

namespace App\Models\GameManagement;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $fillable = [
        'genre_id',
        'name',
        'description',
        'thumbnail',
        'slug',
        'status',
    ];

    protected function casts() :array 
    {
        return [
            'status' => 'string',
            'deleted_at' => 'datetime',
        ];
    }
}

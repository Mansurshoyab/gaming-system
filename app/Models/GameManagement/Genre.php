<?php

namespace App\Models\GameManagement;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Genre extends Model
{
    use SoftDeletes;

    protected $fillable = [ 'title', 'description', 'slug', 'status' ];

    protected function casts() :array
    {
        return [
            'status' => 'string',
            'deleted_at' => 'datetime',
        ];
    }
}

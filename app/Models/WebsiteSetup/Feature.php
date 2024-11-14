<?php

namespace App\Models\WebsiteSetup;

use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    protected $fillable = [
        'icon',
        'label',
        'description',
        'key',
        'status',];

        protected function casts() :array 
        {
            return [
                'status' => 'string',
                'deleted_at' => 'datetime',
            ];
        }
}

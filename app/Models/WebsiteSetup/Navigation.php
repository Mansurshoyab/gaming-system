<?php

namespace App\Models\WebsiteSetup;

use Illuminate\Database\Eloquent\Model;

class Navigation extends Model
{
    protected $fillable =[
        'icon',
        'guard',
        'label',
        'parent_id',
        'route',
        'instance',
        'submenu',
    ]; 
    protected function casts() :array 
    {
        return [
            'deleted_at' => 'datetime',
        ];
    }
}

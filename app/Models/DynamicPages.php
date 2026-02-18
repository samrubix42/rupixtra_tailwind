<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DynamicPages extends Model
{
    protected $table = 'dynamic_pages';

    protected $fillable = [
        'title',
        'slug',
        'content',
    ];

    protected $casts = [
        'content' => 'array',
    ];
}

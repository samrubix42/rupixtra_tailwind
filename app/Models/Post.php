<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BlogCategory;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'category_id',
        'slug',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'tags',
        'featured_image',
        'content',
        'is_published',
    ];

    protected $casts = [
        'is_published' => 'boolean',
    ];

    public function category()
    {
        return $this->belongsTo(BlogCategory::class, 'category_id');
    }
}

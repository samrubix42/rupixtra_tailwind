<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'primary_section',
        'featured_image',
        'secondary_sections',
        'tertiary_sections',
    ];

    protected $casts = [
        'secondary_sections' => 'array',
        'tertiary_sections' => 'array',
    ];

	public function lenders()
	{
		return $this->hasMany(ServiceLender::class);
	}
}

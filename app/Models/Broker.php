<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
class Broker extends Model
{
    use HasTranslations;

    protected $fillable = [
        'slug',
        'name',
        'description',
        'license_number',
        'phone',
        'email',
        'website',
        'address',
        'logo',
        'rating',
        'tags',
        'is_active',
        'is_featured',
        'is_top',
        'is_verified',
        'sort_order',
    ];

    public array $translatable = [
        'name',
        'description',
        'address',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'is_featured' => 'boolean',
        'is_top' => 'boolean',
        'is_verified' => 'boolean',
        'rating' => 'integer',
        'tags' => 'array',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

}

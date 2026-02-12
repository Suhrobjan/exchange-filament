<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class RegionalOffice extends Model
{
    use HasTranslations;

    protected $fillable = [
        'slug',
        'name',
        'address',
        'phone',
        'email',
        'manager_name',
        'manager_position',
        'manager_photo',
        'region_code',
        'latitude',
        'longitude',
        'is_active',
        'sort_order',
    ];

    public array $translatable = [
        'name',
        'address',
        'manager_name',
        'manager_position',
        'working_hours',
    ];

    protected $casts = [
        'latitude' => 'decimal:8',
        'longitude' => 'decimal:8',
        'is_active' => 'boolean',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function getCoordinatesAttribute(): array
    {
        return [
            'lat' => $this->latitude,
            'lng' => $this->longitude,
        ];
    }
}

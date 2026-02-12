<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Quote extends Model
{
    use HasTranslations;

    protected $fillable = [
        'commodity_code',
        'commodity_name',
        'commodity_category',
        'contract_type',
        'delivery_basis',
        'delivery_region',
        'price',
        'price_usd',
        'currency',
        'unit',
        'change_percent',
        'change_absolute',
        'min_price',
        'max_price',
        'trade_volume',
        'session_date',
        'status',
    ];

    public array $translatable = [
        'commodity_name',
        'delivery_basis',
        'delivery_region',
        'unit',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'price_usd' => 'decimal:2',
        'change_percent' => 'decimal:2',
        'change_absolute' => 'decimal:2',
        'min_price' => 'decimal:2',
        'max_price' => 'decimal:2',
        'trade_volume' => 'decimal:2',
        'session_date' => 'date',
    ];

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function scopeCategory($query, string $category)
    {
        return $query->where('commodity_category', $category);
    }

    public function scopeByDate($query, $date)
    {
        return $query->where('session_date', $date);
    }

    public function isPositiveChange(): bool
    {
        return $this->change_percent > 0;
    }

    public function getFormattedPriceAttribute(): string
    {
        return number_format($this->price, 0, ',', ' ') . ' ' . $this->currency;
    }
}

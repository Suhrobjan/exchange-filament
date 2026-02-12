<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class TradingSession extends Model
{
    use HasTranslations;

    protected $fillable = [
        'title',
        'time',
        'icon',
        'sort_order',
        'is_active',
    ];

    public array $translatable = [
        'title',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];
}

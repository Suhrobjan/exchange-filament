<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class TradeEvent extends Model
{
    use HasTranslations;

    protected $fillable = [
        'title',
        'event_date',
        'start_time',
        'end_time',
        'category',
        'is_holiday',
    ];

    public array $translatable = [
        'title',
    ];

    protected $casts = [
        'event_date' => 'date',
        'is_holiday' => 'boolean',
    ];
}

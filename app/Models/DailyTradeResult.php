<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class DailyTradeResult extends Model
{
    use HasTranslations;

    protected $fillable = [
        'date',
        'total_deals',
        'total_volume',
        'top_commodity',
        'total_participants',
    ];

    public array $translatable = [
        'top_commodity',
    ];

    protected $casts = [
        'date' => 'date',
        'total_volume' => 'decimal:2',
    ];

    public function getFormattedVolumeAttribute(): string
    {
        return number_format((float) $this->total_volume, 0, ',', ' ') . ' UZS';
    }
}

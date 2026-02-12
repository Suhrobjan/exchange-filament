<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Spatie\Translatable\HasTranslations;

class Translation extends Model
{
    use HasTranslations;

    protected $fillable = ['group', 'key', 'text'];

    public array $translatable = ['text'];

    protected static function booted(): void
    {
        static::saved(fn() => Cache::forget('translations'));
        static::deleted(fn() => Cache::forget('translations'));
    }

    public static function getAllCached(): array
    {
        return Cache::rememberForever('translations', function () {
            return static::all()
                ->mapWithKeys(fn($t) => [$t->key => $t])
                ->toArray();
        });
    }
}

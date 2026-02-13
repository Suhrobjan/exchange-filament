<?php

use App\Models\Translation;
use Illuminate\Support\Facades\Cache;

if (!function_exists('t')) {
    /**
     * Get a translated UI string by key.
     * Usage: t('home.popular_commodities') or t('footer.about', 'О бирже')
     */
    function t(string $key, string $fallback = ''): string
    {
        $locale = app()->getLocale();

        $translations = Cache::rememberForever('translations', function () {
            return Translation::all()->mapWithKeys(function ($t) {
                return [
                    $t->key => [
                        'uz' => $t->getTranslation('text', 'uz'),
                        'ru' => $t->getTranslation('text', 'ru'),
                        'en' => $t->getTranslation('text', 'en'),
                    ]
                ];
            })->toArray();
        });

        if (isset($translations[$key][$locale]) && $translations[$key][$locale] !== '') {
            return $translations[$key][$locale];
        }

        // Self-Healing: If key doesn't exist in any locale, create it
        if (!isset($translations[$key])) {
            $parts = explode('.', $key);
            $group = count($parts) > 1 ? $parts[0] : 'common';

            // Create in DB
            Translation::updateOrCreate(
                ['key' => $key],
                ['group' => $group, 'text' => ['uz' => $fallback ?: $key, 'ru' => '', 'en' => '']]
            );

            // Clear cache to pick up new key next time
            Cache::forget('translations');
        }

        // Fallback chain: current locale → uz → ru → en → fallback string
        foreach (['uz', 'ru', 'en'] as $fb) {
            if (isset($translations[$key][$fb]) && $translations[$key][$fb] !== '') {
                return $translations[$key][$fb];
            }
        }

        return $fallback ?: $key;
    }
}

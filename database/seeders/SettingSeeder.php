<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Статистика для главной страницы
        $stats = [
            'participants' => ['ru' => '1 250', 'uz' => '1 250', 'en' => '1,250'],
            'volume' => ['ru' => '1.5 трлн', 'uz' => '1.5 trln', 'en' => '1.5 trln'],
            'active_lots' => ['ru' => '4 800', 'uz' => '4 800', 'en' => '4,800'],
            'daily_trades' => ['ru' => '920', 'uz' => '920', 'en' => '920'],
        ];

        foreach ($stats as $key => $value) {
            Setting::updateOrCreate(
                ['key' => $key],
                [
                    'group' => 'stats',
                    'type' => 'text',
                    'value' => $value,
                ]
            );
        }

        // 2. Контактная информация
        $contacts = [
            'phone' => ['ru' => '+998 (71) 123-45-67', 'uz' => '+998 (71) 123-45-67', 'en' => '+998 (71) 123-45-67'],
            'email' => ['ru' => 'info@uzex.uz', 'uz' => 'info@uzex.uz', 'en' => 'info@uzex.uz'],
            'address' => [
                'ru' => 'г. Ташкент, ул. Бобура, 77',
                'uz' => 'Toshkent sh., Bobur ko\'chasi, 77',
                'en' => '77 Bobur street, Tashkent'
            ],
            'working_hours' => [
                'ru' => 'Пн-Пт: 09:00 - 18:00',
                'uz' => 'Du-Ju: 09:00 - 18:00',
                'en' => 'Mon-Fri: 09:00 - 18:00'
            ],
            'helpline' => ['ru' => '1234', 'uz' => '1234', 'en' => '1234'],
        ];

        foreach ($contacts as $key => $value) {
            Setting::updateOrCreate(
                ['key' => $key],
                [
                    'group' => 'contacts',
                    'type' => 'text',
                    'value' => $value,
                ]
            );
        }

        // 3. Социальные сети
        $socials = [
            'telegram' => ['ru' => 'https://t.me/uzexofficial', 'uz' => 'https://t.me/uzexofficial', 'en' => 'https://t.me/uzexofficial'],
            'facebook' => ['ru' => 'https://facebook.com/uzex', 'uz' => 'https://facebook.com/uzex', 'en' => 'https://facebook.com/uzex'],
            'instagram' => ['ru' => 'https://instagram.com/uzex', 'uz' => 'https://instagram.com/uzex', 'en' => 'https://instagram.com/uzex'],
        ];

        foreach ($socials as $key => $value) {
            Setting::updateOrCreate(
                ['key' => $key],
                [
                    'group' => 'social',
                    'type' => 'text',
                    'value' => $value,
                ]
            );
        }

        // 4. Общие настройки
        $general = [
            'site_name' => [
                'ru' => 'Узбекская республиканская товарно-сырьевая биржа',
                'uz' => 'O\'zbekiston respublika tovar-homashyo birjasi',
                'en' => 'Uzbek Republican Commodity Exchange'
            ],
        ];

        foreach ($general as $key => $value) {
            Setting::updateOrCreate(
                ['key' => $key],
                [
                    'group' => 'general',
                    'type' => 'text',
                    'value' => $value,
                ]
            );
        }
    }
}

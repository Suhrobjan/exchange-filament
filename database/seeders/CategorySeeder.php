<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => ['ru' => 'Биржевые торги', 'uz' => 'Birja savdolari', 'en' => 'Exchange Trading'], 'slug' => 'trading', 'description' => ['ru' => 'Новости биржевых торгов', 'uz' => 'Birja savdolari yangiliklari', 'en' => 'Exchange trading news']],
            ['name' => ['ru' => 'Аналитика', 'uz' => 'Tahlillar', 'en' => 'Analytics'], 'slug' => 'analytics', 'description' => ['ru' => 'Аналитические обзоры рынка', 'uz' => 'Bozor tahlillari', 'en' => 'Market analytics']],
            ['name' => ['ru' => 'Законодательство', 'uz' => 'Qonunchilik', 'en' => 'Legislation'], 'slug' => 'legislation', 'description' => ['ru' => 'Изменения в законодательстве', 'uz' => 'Qonunchilikdagi o\'zgarishlar', 'en' => 'Legislative changes']],
            ['name' => ['ru' => 'Мероприятия', 'uz' => 'Tadbirlar', 'en' => 'Events'], 'slug' => 'events', 'description' => ['ru' => 'Конференции и семинары', 'uz' => 'Konferensiya va seminarlar', 'en' => 'Conferences and seminars']],
            ['name' => ['ru' => 'Пресс-релизы', 'uz' => 'Press-relizlar', 'en' => 'Press Releases'], 'slug' => 'press', 'description' => ['ru' => 'Официальные пресс-релизы', 'uz' => 'Rasmiy press-relizlar', 'en' => 'Official press releases']],
        ];

        foreach ($categories as $cat) {
            Category::updateOrCreate(['slug' => $cat['slug']], $cat);
        }
    }
}

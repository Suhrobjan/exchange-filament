<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Announcement;

class AnnouncementSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            ['slug' => 'accreditation-deadline-2026', 'title' => ['ru' => 'Продлён срок аккредитации брокеров', 'uz' => 'Brokerlar akkreditatsiyasi muddati uzaytirildi', 'en' => 'Broker accreditation deadline extended'], 'content' => ['ru' => '<p>Срок подачи документов на аккредитацию продлён до 15 марта 2026 года. Все заинтересованные организации могут подать заявки через портал УЗЕКС.</p>', 'uz' => '<p>Akkreditatsiya uchun hujjatlar topshirish muddati 2026 yil 15 martgacha uzaytirildi.</p>', 'en' => '<p>The deadline for submitting accreditation documents has been extended until March 15, 2026.</p>'], 'type' => 'important', 'is_published' => true, 'published_at' => now()->subDays(1)],
            ['slug' => 'system-maintenance-feb', 'title' => ['ru' => 'Плановое техническое обслуживание', 'uz' => 'Rejalashtirilgan texnik xizmat ko\'rsatish', 'en' => 'Scheduled system maintenance'], 'content' => ['ru' => '<p>15 февраля с 22:00 до 06:00 будет проводиться плановое техническое обслуживание торговой системы.</p>', 'uz' => '<p>15 fevral kuni soat 22:00 dan 06:00 gacha savdo tizimiga rejalashtirilgan texnik xizmat ko\'rsatish o\'tkaziladi.</p>', 'en' => '<p>On February 15, from 22:00 to 06:00, scheduled maintenance of the trading system will be performed.</p>'], 'type' => 'warning', 'is_published' => true, 'published_at' => now()->subDays(3)],
            ['slug' => 'new-commodity-codes', 'title' => ['ru' => 'Обновлены коды биржевых товаров', 'uz' => 'Birja tovarlari kodlari yangilandi', 'en' => 'Commodity codes updated'], 'content' => ['ru' => '<p>С 1 марта 2026 года вводятся обновлённые коды для классификации биржевых товаров в соответствии с международными стандартами.</p>', 'uz' => '<p>2026 yil 1 martdan xalqaro standartlarga muvofiq birja tovarlari klassifikatsiyasi uchun yangilangan kodlar kiritiladi.</p>', 'en' => '<p>From March 1, 2026, updated codes for classifying exchange commodities will be introduced.</p>'], 'type' => 'info', 'is_published' => true, 'published_at' => now()->subDays(5)],
            ['slug' => 'quarterly-fees-update', 'title' => ['ru' => 'Изменение тарифов на услуги биржи', 'uz' => 'Birja xizmatlari tariflarining o\'zgarishi', 'en' => 'Exchange service tariff changes'], 'content' => ['ru' => '<p>С нового квартала обновляются тарифы на брокерские и клиринговые услуги. Подробности доступны в разделе документов.</p>', 'uz' => '<p>Yangi chorakdan brokerlik va kliring xizmatlari tariflari yangilanadi.</p>', 'en' => '<p>Brokerage and clearing service tariffs will be updated from the new quarter.</p>'], 'type' => 'info', 'is_published' => true, 'published_at' => now()->subDays(8)],
            ['slug' => 'training-webinar-march', 'title' => ['ru' => 'Бесплатный вебинар для новых участников', 'uz' => 'Yangi ishtirokchilar uchun bepul vebinar', 'en' => 'Free webinar for new participants'], 'content' => ['ru' => '<p>УЗЕКС приглашает на бесплатный обучающий вебинар «Как начать торговать на бирже» 5 марта 2026 г.</p>', 'uz' => '<p>UZEX 2026 yil 5 mart kuni "Birjada savdo qilishni qanday boshlash mumkin" bepul o\'quv vebinariga taklif etadi.</p>', 'en' => '<p>UZEX invites you to a free training webinar on March 5, 2026.</p>'], 'type' => 'info', 'is_published' => true, 'published_at' => now()->subDays(2)],
        ];

        foreach ($items as $item) {
            Announcement::updateOrCreate(['slug' => $item['slug']], $item);
        }
    }
}

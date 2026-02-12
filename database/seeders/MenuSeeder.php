<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MenuItem;

class MenuSeeder extends Seeder
{
    public function run()
    {
        // 1. О БИРЖЕ
        $about = MenuItem::create([
            'title' => ['uz' => 'BIRJA HAQIDA', 'ru' => 'О БИРЖЕ', 'en' => 'ABOUT EXCHANGE'],
            'url' => '#',
            'sort_order' => 1,
        ]);

        MenuItem::create([
            'parent_id' => $about->id,
            'title' => ['uz' => 'Birja haqida', 'ru' => 'О бирже', 'en' => 'About'],
            'url' => '/about',
            'description' => ['uz' => 'Umumiy ma\'lumot va ko\'rsatkichlar', 'ru' => 'Общая информация и показатели', 'en' => 'General info'],
            'sort_order' => 1,
        ]);

        MenuItem::create([
            'parent_id' => $about->id,
            'title' => ['uz' => 'Boshqaruv', 'ru' => 'Руководство', 'en' => 'Management'],
            'url' => '/management',
            'description' => ['uz' => 'Boshqaruv tarkibi', 'ru' => 'Состав правления и Наблюдательного совета', 'en' => 'Board members'],
            'sort_order' => 2,
        ]);

        MenuItem::create([
            'parent_id' => $about->id,
            'title' => ['uz' => 'Hududiy filiallar', 'ru' => 'Региональные филиалы', 'en' => 'Regional Offices'],
            'url' => '/regions',
            'description' => ['uz' => 'Bizning hududiy vakolatxonalarimiz', 'ru' => 'Наши региональные представительства', 'en' => 'Our regions'],
            'sort_order' => 3,
        ]);

        // 2. РАСКРЫТИЕ ИНФОРМАЦИИ
        $disclosure = MenuItem::create([
            'title' => ['uz' => 'MA\'LUMOTLARNI OCHIQLASH', 'ru' => 'РАСКРЫТИЕ ИНФОРМАЦИИ', 'en' => 'DISCLOSURE'],
            'url' => '#',
            'sort_order' => 2,
        ]);

        MenuItem::create([
            'parent_id' => $disclosure->id,
            'title' => ['uz' => 'Rasmiy ochiqlash', 'ru' => 'Официальное раскрытие', 'en' => 'Official Disclosure'],
            'url' => '/disclosure',
            'description' => ['uz' => 'Jamiyat to\'g\'risidagi asosiy ma\'lumotlar', 'ru' => 'Основные сведения об обществе', 'en' => 'General info'],
            'sort_order' => 1,
        ]);

        MenuItem::create([
            'parent_id' => $disclosure->id,
            'title' => ['uz' => 'Me\'yoriy hujjatlar', 'ru' => 'Нормативные документы', 'en' => 'Regulatory'],
            'url' => '/documents/regulatory',
            'description' => ['uz' => 'Qonun hujjatlari va nizomlar', 'ru' => 'Законодательные акты и регламенты', 'en' => 'Regulations'],
            'sort_order' => 2,
        ]);

        // 3. ТОРГИ
        $trading = MenuItem::create([
            'title' => ['uz' => 'SAVDOLAR', 'ru' => 'ТОРГИ', 'en' => 'TRADING'],
            'url' => '#',
            'sort_order' => 3,
        ]);

        MenuItem::create([
            'parent_id' => $trading->id,
            'title' => ['uz' => 'Kotirovkalar', 'ru' => 'Котировки', 'en' => 'Quotes'],
            'url' => '/quotes',
            'description' => ['uz' => 'Joriy bozor narxlari', 'ru' => 'Текущие рыночные цены', 'en' => 'Market prices'],
            'sort_order' => 1,
        ]);

        // 4. УЧАСТНИКАМ
        $participants = MenuItem::create([
            'title' => ['uz' => 'ISHTIROKCHILARGA', 'ru' => 'УЧАСТНИКАМ', 'en' => 'PARTICIPANTS'],
            'url' => '#',
            'sort_order' => 4,
        ]);

        MenuItem::create([
            'parent_id' => $participants->id,
            'title' => ['uz' => 'Brokerlar', 'ru' => 'Брокеры', 'en' => 'Brokers'],
            'url' => '/brokers',
            'description' => ['uz' => 'Amaldagi ishtirokchilar reyestri', 'ru' => 'Реестр действующих участников', 'en' => 'Brokers list'],
            'sort_order' => 1,
        ]);
    }
}

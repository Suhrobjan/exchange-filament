<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Page;

class PageSeeder extends Seeder
{
    public function run(): void
    {
        $pages = [
            [
                'slug' => 'about',
                'template' => 'about',
                'title' => ['ru' => 'О бирже', 'uz' => 'Birja haqida', 'en' => 'About'],
                'content' => ['ru' => '<h2>О компании</h2><p>Узбекская республиканская товарно-сырьевая биржа (RUAPB) — ведущая биржевая площадка Узбекистана, основанная в 1994 году. Биржа обеспечивает прозрачную и эффективную платформу для торговли товарами и сырьём.</p><h3>Наша миссия</h3><p>Создание современной, прозрачной и эффективной биржевой инфраструктуры для развития товарного рынка Узбекистана и интеграции в мировое экономическое пространство.</p><h3>Основные направления</h3><ul><li>Организация биржевых торгов</li><li>Клиринг и расчёты</li><li>Аккредитация участников</li><li>Информационно-аналитические услуги</li><li>Развитие электронной торговли</li></ul>', 'uz' => '<h2>Kompaniya haqida</h2><p>O\'zbekiston Respublika tovar-xom ashyo birjasi (UZEX) — 1994 yilda tashkil etilgan O\'zbekistonning yetakchi birja maydoni.</p>', 'en' => '<h2>About the Company</h2><p>The Uzbek Republican Commodity Exchange (UZEX) is the leading exchange platform of Uzbekistan, established in 1994.</p>'],
                'meta_title' => ['ru' => 'О бирже — RUAPB', 'uz' => 'Birja haqida — UZEX', 'en' => 'About — UZEX'],
                'meta_description' => ['ru' => 'Информация о деятельности RUAPB', 'uz' => 'UZEX faoliyati haqida ma\'lumot', 'en' => 'Information about UZEX activities'],
                'is_published' => true,
                'sort_order' => 1,
            ],
            [
                'slug' => 'management',
                'template' => 'management',
                'title' => ['ru' => 'Руководство', 'uz' => 'Rahbariyat', 'en' => 'Management'],
                'content' => ['ru' => '<p>Руководство Узбекской республиканской товарно-сырьевой биржи осуществляется Наблюдательным советом и Правлением. Наблюдательный совет определяет стратегию развития, а Правление обеспечивает оперативное управление деятельностью биржи.</p>', 'uz' => '<p>UZEX rahbariyati Kuzatuv kengashi va Boshqaruv tomonidan amalga oshiriladi.</p>', 'en' => '<p>UZEX management is carried out by the Supervisory Board and the Board of Directors.</p>'],
                'meta_title' => ['ru' => 'Руководство — RUAPB', 'uz' => 'Rahbariyat — UZEX', 'en' => 'Management — UZEX'],
                'meta_description' => ['ru' => 'Руководство и структура управления RUAPB', 'uz' => 'UZEX rahbariyati va boshqaruv tuzilmasi', 'en' => 'UZEX management and governance structure'],
                'is_published' => true,
                'sort_order' => 2,
            ],
            [
                'slug' => 'shareholders',
                'template' => 'shareholders',
                'title' => ['ru' => 'Акционерам', 'uz' => 'Aksiyadorlarga', 'en' => 'Shareholders'],
                'content' => ['ru' => '<p>Раздел для акционеров RUAPB. Здесь размещается информация о собраниях акционеров, дивидендной политике, годовых отчётах и корпоративном управлении.</p><h3>Уставный капитал</h3><p>Уставный капитал биржи составляет 50 млрд. сум. Основные акционеры — Министерство финансов и ведущие коммерческие банки страны.</p>', 'uz' => '<p>UZEX aksiyadorlari uchun bo\'lim. Bu yerda aksiyadorlar yig\'ilishlari haqida ma\'lumot joylashtiriladi.</p>', 'en' => '<p>Section for UZEX shareholders. Information about shareholder meetings, dividend policy, annual reports.</p>'],
                'meta_title' => ['ru' => 'Акционерам — RUAPB', 'uz' => 'Aksiyadorlarga — UZEX', 'en' => 'Shareholders — UZEX'],
                'meta_description' => ['ru' => 'Информация для акционеров RUAPB', 'uz' => 'UZEX aksiyadorlari uchun ma\'lumot', 'en' => 'Information for UZEX shareholders'],
                'is_published' => true,
                'sort_order' => 3,
            ],
            [
                'slug' => 'disclosure',
                'template' => 'default',
                'title' => ['ru' => 'Раскрытие информации', 'uz' => 'Ma\'lumotni oshkor qilish', 'en' => 'Information Disclosure'],
                'content' => ['ru' => '<p>В соответствии с требованиями законодательства Республики Узбекистан, RUAPB осуществляет раскрытие информации о своей деятельности.</p><h3>Финансовая отчётность</h3><p>Годовые и квартальные финансовые отчёты доступны в разделе документов.</p><h3>Существенные факты</h3><p>Информация о существенных событиях публикуется в установленные сроки.</p>', 'uz' => '<p>O\'zbekiston Respublikasi qonunchiligiga muvofiq UZEX o\'z faoliyati haqida ma\'lumotni oshkor qiladi.</p>', 'en' => '<p>In accordance with the legislation of the Republic of Uzbekistan, UZEX discloses information about its activities.</p>'],
                'meta_title' => ['ru' => 'Раскрытие информации — RUAPB', 'uz' => 'Ma\'lumotni oshkor qilish — UZEX', 'en' => 'Disclosure — UZEX'],
                'meta_description' => ['ru' => 'Раскрытие информации о деятельности RUAPB', 'uz' => 'UZEX faoliyati haqida ma\'lumotni oshkor qilish', 'en' => 'UZEX activity information disclosure'],
                'is_published' => true,
                'sort_order' => 4,
            ],
            [
                'slug' => 'accreditation',
                'template' => 'accreditation',
                'title' => ['ru' => 'Аккредитация', 'uz' => 'Akkreditatsiya', 'en' => 'Accreditation'],
                'content' => ['ru' => '<p>Аккредитация на бирже — обязательная процедура для всех участников торгов. Она включает проверку документов, финансовой устойчивости и квалификации специалистов.</p><h3>Этапы аккредитации</h3><ol><li>Подача заявки через портал RUAPB</li><li>Предоставление учредительных документов</li><li>Проверка финансовых показателей</li><li>Оплата регистрационного сбора</li><li>Получение свидетельства об аккредитации</li></ol><h3>Стоимость</h3><p>Регистрационный сбор составляет 5 БРВ (базовых расчётных величин).</p>', 'uz' => '<p>Birjada akkreditatsiya — barcha savdo ishtirokchilari uchun majburiy protsedura.</p>', 'en' => '<p>Exchange accreditation is a mandatory procedure for all trading participants.</p>'],
                'meta_title' => ['ru' => 'Аккредитация — RUAPB', 'uz' => 'Akkreditatsiya — UZEX', 'en' => 'Accreditation — UZEX'],
                'meta_description' => ['ru' => 'Аккредитация участников торгов на RUAPB', 'uz' => 'UZEX savdo ishtirokchilarini akkreditatsiya qilish', 'en' => 'UZEX trading participant accreditation'],
                'is_published' => true,
                'sort_order' => 5,
            ],
            [
                'slug' => 'business-plan',
                'template' => 'default',
                'title' => ['ru' => 'Бизнес-план', 'uz' => 'Biznes-reja', 'en' => 'Business Plan'],
                'content' => ['ru' => '<p>Стратегический бизнес-план развития RUAPB на 2025-2030 годы предусматривает модернизацию торговой инфраструктуры, внедрение новых финансовых инструментов и расширение международного сотрудничества.</p><h3>Ключевые цели</h3><ul><li>Увеличение объёма торгов на 200%</li><li>Привлечение 500+ новых участников</li><li>Запуск фьючерсных контрактов</li><li>Интеграция с международными биржами</li></ul>', 'uz' => '<p>2025-2030 yillar uchun UZEX strategik biznes-rejasi savdo infratuzilmasini modernizatsiya qilishni nazarda tutadi.</p>', 'en' => '<p>UZEX strategic business plan for 2025-2030 envisages modernization of trading infrastructure.</p>'],
                'meta_title' => ['ru' => 'Бизнес-план — RUAPB', 'uz' => 'Biznes-reja — UZEX', 'en' => 'Business Plan — UZEX'],
                'meta_description' => ['ru' => 'Бизнес-план развития RUAPB', 'uz' => 'UZEX rivojlanish biznes-rejasi', 'en' => 'UZEX development business plan'],
                'is_published' => true,
                'sort_order' => 6,
            ],
            [
                'slug' => 'contacts',
                'template' => 'contacts',
                'title' => ['ru' => 'Контакты', 'uz' => 'Kontaktlar', 'en' => 'Contacts'],
                'content' => ['ru' => '<p>Свяжитесь с нами для получения дополнительной информации о работе биржи.</p>', 'uz' => '<p>Birja faoliyati haqida qo\'shimcha ma\'lumot olish uchun biz bilan bog\'laning.</p>', 'en' => '<p>Contact us for more information about the exchange operations.</p>'],
                'meta_title' => ['ru' => 'Контакты — RUAPB', 'uz' => 'Kontaktlar — UZEX', 'en' => 'Contacts — UZEX'],
                'meta_description' => ['ru' => 'Контактная информация Узбекской республиканской товарно-сырьевой биржи', 'uz' => 'O\'zbekiston Respublika tovar-xom ashyo birjasi aloqa ma\'lumotlari', 'en' => 'Contact information of the Uzbek Republican Commodity Exchange'],
                'is_published' => true,
                'sort_order' => 7,
            ],
        ];

        foreach ($pages as $p) {
            Page::updateOrCreate(['slug' => $p['slug']], $p);
        }
    }
}

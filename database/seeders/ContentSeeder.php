<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Faq;
use App\Models\Document;
use App\Models\Staff;
use App\Models\RegionalOffice;

class ContentSeeder extends Seeder
{
    public function run(): void
    {
        $this->seedFaq();
        $this->seedDocuments();
        $this->seedStaff();
    }

    private function seedFaq(): void
    {
        $faqs = [
            ['question' => ['ru' => 'Как пройти аккредитацию на бирже?', 'uz' => 'Birjada akkreditatsiyadan qanday o\'tish mumkin?', 'en' => 'How to get accredited on the exchange?'], 'answer' => ['ru' => 'Для аккредитации необходимо подать заявку через портал УЗЕКС, приложить учредительные документы и оплатить регистрационный взнос. Срок рассмотрения — 10 рабочих дней.', 'uz' => 'Akkreditatsiya uchun UZEX portali orqali ariza topshirish, ta\'sis hujjatlarini ilova qilish va ro\'yxatdan o\'tish to\'lovini amalga oshirish kerak.', 'en' => 'To get accredited, submit an application through the UZEX portal, attach founding documents and pay the registration fee.'], 'category' => 'accreditation', 'is_published' => true, 'sort_order' => 1],
            ['question' => ['ru' => 'Какие документы нужны для регистрации брокера?', 'uz' => 'Brokerni ro\'yxatdan o\'tkazish uchun qanday hujjatlar kerak?', 'en' => 'What documents are needed for broker registration?'], 'answer' => ['ru' => 'Устав, свидетельство о госрегистрации, лицензия ЦБ, финансовая отчётность за последний год, справка об отсутствии задолженности.', 'uz' => 'Nizom, davlat ro\'yxatidan o\'tganlik guvohnomasi, MB litsenziyasi, oxirgi yil moliyaviy hisoboti.', 'en' => 'Charter, state registration certificate, Central Bank license, last year financial report.'], 'category' => 'accreditation', 'is_published' => true, 'sort_order' => 2],
            ['question' => ['ru' => 'Как проходят биржевые торги?', 'uz' => 'Birja savdolari qanday o\'tadi?', 'en' => 'How does exchange trading work?'], 'answer' => ['ru' => 'Торги проводятся ежедневно с 10:00 до 16:00 по ташкентскому времени. Участники подают заявки через электронную систему. Сделки заключаются по принципу наилучшей цены.', 'uz' => 'Savdolar Toshkent vaqti bilan har kuni soat 10:00 dan 16:00 gacha o\'tkaziladi. Ishtirokchilar elektron tizim orqali arizalar topshiradi.', 'en' => 'Trading is conducted daily from 10:00 to 16:00 Tashkent time. Participants submit orders through the electronic system.'], 'category' => 'trading', 'is_published' => true, 'sort_order' => 3],
            ['question' => ['ru' => 'Какие товары торгуются на бирже?', 'uz' => 'Birjada qanday tovarlar sotiladi?', 'en' => 'What commodities are traded on the exchange?'], 'answer' => ['ru' => 'На бирже торгуются: хлопок, зерновые (пшеница, кукуруза, рис), металлы (медь, золото, алюминий), нефтепродукты, строительные материалы, текстиль.', 'uz' => 'Birjada: paxta, don ekinlari, metallar, neft mahsulotlari, qurilish materiallari, to\'qimachilik savdo qilinadi.', 'en' => 'Cotton, grains, metals, petroleum products, construction materials, and textiles are traded.'], 'category' => 'trading', 'is_published' => true, 'sort_order' => 4],
            ['question' => ['ru' => 'Какова комиссия биржи?', 'uz' => 'Birja komissiyasi qancha?', 'en' => 'What is the exchange commission?'], 'answer' => ['ru' => 'Комиссия составляет 0.1% от суммы сделки для покупателя и 0.1% для продавца. Минимальная комиссия — 50 000 сум.', 'uz' => 'Komissiya xaridor uchun bitim summasining 0.1% va sotuvchi uchun 0.1% ni tashkil etadi.', 'en' => 'Commission is 0.1% of the transaction amount for the buyer and 0.1% for the seller.'], 'category' => 'fees', 'is_published' => true, 'sort_order' => 5],
            ['question' => ['ru' => 'Как получить выписку о торгах?', 'uz' => 'Savdolar haqida ko\'chirmani qanday olish mumkin?', 'en' => 'How to get a trading statement?'], 'answer' => ['ru' => 'Выписку можно получить в личном кабинете на сайте УЗЕКС или запросить в отделе клиринга по электронной почте.', 'uz' => 'Ko\'chirmani UZEX veb-saytidagi shaxsiy kabinetda olish mumkin.', 'en' => 'Statements can be obtained in the personal account on the UZEX website.'], 'category' => 'services', 'is_published' => true, 'sort_order' => 6],
            ['question' => ['ru' => 'Есть ли мобильное приложение?', 'uz' => 'Mobil ilova bormi?', 'en' => 'Is there a mobile app?'], 'answer' => ['ru' => 'Да, мобильное приложение УЗЕКС доступно для iOS и Android. Через него можно отслеживать котировки, результаты торгов и получать уведомления.', 'uz' => 'Ha, UZEX mobil ilovasi iOS va Android uchun mavjud.', 'en' => 'Yes, the UZEX mobile app is available for iOS and Android.'], 'category' => 'general', 'is_published' => true, 'sort_order' => 7],
            ['question' => ['ru' => 'Как стать участником торгов?', 'uz' => 'Savdolarda qanday ishtirok etish mumkin?', 'en' => 'How to become a trading participant?'], 'answer' => ['ru' => 'Для участия в торгах необходимо пройти аккредитацию, открыть торговый счёт и заключить договор с аккредитованным брокером.', 'uz' => 'Savdolarda ishtirok etish uchun akkreditatsiyadan o\'tish va akkreditatsiya qilingan broker bilan shartnoma tuzish kerak.', 'en' => 'To participate in trading, you need to get accredited, open a trading account, and sign an agreement with an accredited broker.'], 'category' => 'accreditation', 'is_published' => true, 'sort_order' => 8],
        ];
        foreach ($faqs as $f) {
            Faq::updateOrCreate(['sort_order' => $f['sort_order']], $f);
        }
    }

    private function seedDocuments(): void
    {
        $docs = [
            ['slug' => 'ustav-birji', 'title' => ['ru' => 'Устав Узбекской республиканской товарно-сырьевой биржи', 'uz' => 'O\'zbekiston Respublika tovar-xom ashyo birjasi ustavi', 'en' => 'Charter of UZEX'], 'description' => ['ru' => 'Основной учредительный документ биржи', 'uz' => 'Birjaning asosiy ta\'sis hujjati', 'en' => 'Main founding document'], 'category' => 'corporate', 'is_published' => true, 'sort_order' => 1],
            ['slug' => 'pravila-torgovli', 'title' => ['ru' => 'Правила биржевой торговли', 'uz' => 'Birja savdosi qoidalari', 'en' => 'Trading Rules'], 'description' => ['ru' => 'Регламент проведения торгов', 'uz' => 'Savdolarni o\'tkazish tartibi', 'en' => 'Trading regulations'], 'category' => 'regulatory', 'is_published' => true, 'sort_order' => 2],
            ['slug' => 'tarify-2026', 'title' => ['ru' => 'Тарифы на услуги биржи 2026', 'uz' => 'Birja xizmatlari tariflari 2026', 'en' => 'Exchange service tariffs 2026'], 'description' => ['ru' => 'Актуальные тарифы на 2026 год', 'uz' => '2026 yil uchun amaldagi tariflar', 'en' => 'Current tariffs for 2026'], 'category' => 'tariffs', 'is_published' => true, 'sort_order' => 3],
            ['slug' => 'godovoy-otchet-2025', 'title' => ['ru' => 'Годовой отчёт за 2025 год', 'uz' => '2025 yil uchun yillik hisobot', 'en' => 'Annual Report 2025'], 'description' => ['ru' => 'Финансовый и операционный отчёт', 'uz' => 'Moliyaviy va operatsion hisobot', 'en' => 'Financial and operational report'], 'category' => 'reports', 'is_published' => true, 'sort_order' => 4],
            ['slug' => 'pologenie-akkreditatsiya', 'title' => ['ru' => 'Положение об аккредитации', 'uz' => 'Akkreditatsiya to\'g\'risida nizom', 'en' => 'Accreditation Regulations'], 'description' => ['ru' => 'Порядок аккредитации участников', 'uz' => 'Ishtirokchilarni akkreditatsiya qilish tartibi', 'en' => 'Participant accreditation procedure'], 'category' => 'regulatory', 'is_published' => true, 'sort_order' => 5],
            ['slug' => 'zakon-o-birjah', 'title' => ['ru' => 'Закон «О товарно-сырьевых биржах»', 'uz' => '«Tovar-xom ashyo birjalari to\'g\'risida» qonun', 'en' => 'Law on Commodity Exchanges'], 'description' => ['ru' => 'Основной закон о деятельности бирж', 'uz' => 'Birjalar faoliyati to\'g\'risidagi asosiy qonun', 'en' => 'Main law on exchange activities'], 'category' => 'legislation', 'is_published' => true, 'sort_order' => 6],
        ];
        foreach ($docs as $d) {
            Document::updateOrCreate(['slug' => $d['slug']], $d);
        }
    }

    private function seedStaff(): void
    {
        $staff = [
            ['name' => ['ru' => 'Каримов Бахтиёр Рустамович', 'uz' => 'Karimov Baxtiyor Rustamovich', 'en' => 'Karimov Bakhtiyor'], 'position' => ['ru' => 'Председатель Наблюдательного совета', 'uz' => 'Kuzatuv kengashi raisi', 'en' => 'Chairman of the Supervisory Board'], 'bio' => ['ru' => 'Более 20 лет опыта в финансовом секторе. Окончил ТГЭУ.', 'uz' => 'Moliya sohasida 20 yildan ortiq tajriba.', 'en' => 'Over 20 years of experience in the financial sector.'], 'type' => 'supervisory_board', 'sort_order' => 1, 'is_active' => true],
            ['name' => ['ru' => 'Мирзаев Шухрат Олимович', 'uz' => 'Mirzayev Shuhrat Olimovich', 'en' => 'Mirzayev Shukhrat'], 'position' => ['ru' => 'Член Наблюдательного совета', 'uz' => 'Kuzatuv kengashi a\'zosi', 'en' => 'Member of the Supervisory Board'], 'bio' => ['ru' => 'Эксперт в области международной торговли и логистики.', 'uz' => 'Xalqaro savdo va logistika bo\'yicha ekspert.', 'en' => 'Expert in international trade and logistics.'], 'type' => 'supervisory_board', 'sort_order' => 2, 'is_active' => true],
            ['name' => ['ru' => 'Рахимова Нигора Абдуллаевна', 'uz' => 'Rahimova Nigora Abdullayevna', 'en' => 'Rakhimova Nigora'], 'position' => ['ru' => 'Член Наблюдательного совета', 'uz' => 'Kuzatuv kengashi a\'zosi', 'en' => 'Member of the Supervisory Board'], 'bio' => ['ru' => 'Профессор экономических наук, автор 50+ научных публикаций.', 'uz' => 'Iqtisodiyot fanlari professori, 50+ ilmiy nashrlar muallifi.', 'en' => 'Professor of Economics, author of 50+ publications.'], 'type' => 'supervisory_board', 'sort_order' => 3, 'is_active' => true],
            ['name' => ['ru' => 'Турсунов Азиз Камолович', 'uz' => 'Tursunov Aziz Kamolovich', 'en' => 'Tursunov Aziz'], 'position' => ['ru' => 'Председатель Правления', 'uz' => 'Boshqaruv raisi', 'en' => 'Chairman of the Board'], 'bio' => ['ru' => 'Руководит биржей с 2020 года. 15 лет опыта в биржевом деле.', 'uz' => '2020 yildan beri birjaga rahbarlik qiladi.', 'en' => 'Has led the exchange since 2020. 15 years of exchange experience.'], 'type' => 'board_of_directors', 'sort_order' => 1, 'is_active' => true],
            ['name' => ['ru' => 'Хасанов Давлат Нуриллаевич', 'uz' => 'Xasanov Davlat Nurillayevich', 'en' => 'Khasanov Davlat'], 'position' => ['ru' => 'Заместитель Председателя Правления', 'uz' => 'Boshqaruv raisi o\'rinbosari', 'en' => 'Deputy Chairman of the Board'], 'bio' => ['ru' => 'Отвечает за стратегическое развитие и IT-инфраструктуру.', 'uz' => 'Strategik rivojlanish va IT-infratuzilma uchun javobgar.', 'en' => 'Responsible for strategic development and IT infrastructure.'], 'type' => 'board_of_directors', 'sort_order' => 2, 'is_active' => true],
            ['name' => ['ru' => 'Юсупова Малика Бахрамовна', 'uz' => 'Yusupova Malika Baxramovna', 'en' => 'Yusupova Malika'], 'position' => ['ru' => 'Финансовый директор', 'uz' => 'Moliya direktori', 'en' => 'Chief Financial Officer'], 'bio' => ['ru' => 'Управляет финансовой деятельностью биржи, аудит и отчётность.', 'uz' => 'Birjaning moliyaviy faoliyatini boshqaradi.', 'en' => 'Manages financial operations of the exchange.'], 'type' => 'board_of_directors', 'sort_order' => 3, 'is_active' => true],
        ];
        foreach ($staff as $s) {
            Staff::updateOrCreate(['sort_order' => $s['sort_order'], 'type' => $s['type']], $s);
        }
    }

}

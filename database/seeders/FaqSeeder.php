<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Faq;

class FaqSeeder extends Seeder
{
    public function run(): void
    {
        $faqs = [
            [
                'question' => [
                    'ru' => 'Как стать участником биржевых торгов?',
                    'uz' => 'Birja savdolari ishtirokchisiga qanday aylanish mumkin?',
                    'en' => 'How to become a participant in exchange trades?'
                ],
                'answer' => [
                    'ru' => 'Для участия в торгах необходимо пройти аккредитацию. Подайте заявку онлайн или обратитесь в ближайший офис биржи. Процесс занимает до 5 рабочих дней.',
                    'uz' => 'Savdolarda ishtirok etish uchun akkreditatsiyadan o\'tish kerak. Onlayn ariza topshiring yoki birjaning eng yaqin filialiga murojaat qiling. Jarayon 5 ish kunigacha davom etadi.',
                    'en' => 'To participate in trades, you need to go through accreditation. Apply online or contact the nearest exchange office. The process takes up to 5 working days.'
                ],
                'category' => 'accreditation',
                'sort_order' => 1,
            ],
            [
                'question' => [
                    'ru' => 'Какие документы нужны для аккредитации?',
                    'uz' => 'Akkreditatsiya uchun qanday hujjatlar kerak?',
                    'en' => 'What documents are needed for accreditation?'
                ],
                'answer' => [
                    'ru' => 'Для юридических лиц: заявление, копия свидетельства о регистрации, устав, справка из банка. Для физических лиц: заявление, копия паспорта, ИНН.',
                    'uz' => 'Yuridik shaxslar uchun: ariza, ro\'yxatdan o\'tganlik to\'g\'risidagi guvohnoma nusxasi, ustav, bankdan ma\'lumotnoma. Jismoniy shaxslar uchun: ariza, pasport nusxasi, STIR.',
                    'en' => 'For legal entities: application, copy of registration certificate, charter, bank certificate. For individuals: application, copy of passport, TIN.'
                ],
                'category' => 'accreditation',
                'sort_order' => 2,
            ],
            [
                'question' => [
                    'ru' => 'Какова стоимость аккредитации?',
                    'uz' => 'Akkreditatsiya narxi qancha?',
                    'en' => 'What is the cost of accreditation?'
                ],
                'answer' => [
                    'ru' => 'Стоимость аккредитации зависит от категории участника. Актуальные тарифы доступны на странице документов или по запросу в службу поддержки.',
                    'uz' => 'Akkreditatsiya narxi ishtirokchi toifasiga bog\'liq. Amaldagi tariflar hujjatlar sahifasida yoki qo\'llab-quvvatlash xizmati so\'rovi bo\'yicha mavjud.',
                    'en' => 'The cost of accreditation depends on the category of the participant. Current tariffs are available on the documents page or upon request to the support service.'
                ],
                'category' => 'accreditation',
                'sort_order' => 3,
            ],
            [
                'question' => [
                    'ru' => 'Как проходят торги на бирже?',
                    'uz' => 'Birjada savdolar qanday o\'tkaziladi?',
                    'en' => 'How are trades conducted on the exchange?'
                ],
                'answer' => [
                    'ru' => 'Торги проводятся ежедневно с 9:00 до 18:00 в электронном формате через торговую платформу. Участники подают заявки, система автоматически сводит покупателей и продавцов.',
                    'uz' => 'Savdolar har kuni soat 9:00 dan 18:00 gacha savdo platformasi orqali elektron shaklda o\'tkaziladi. Ishtirokchilar buyurtmalar berishadi, tizim avtomatik ravishda xaridor va sotuvchilarni bog\'laydi.',
                    'en' => 'Trades are conducted daily from 09:00 to 18:00 in electronic format through the trading platform. Participants submit orders, and the system automatically matches buyers and sellers.'
                ],
                'category' => 'trading',
                'sort_order' => 4,
            ],
            [
                'question' => [
                    'ru' => 'Какие товары торгуются на бирже?',
                    'uz' => 'Birjada qanday tovarlar sotiladi?',
                    'en' => 'What commodities are traded on the exchange?'
                ],
                'answer' => [
                    'ru' => 'На бирже торгуются: хлопок и хлопковое волокно, зерновые культуры, масличные, драгоценные металлы, нефтепродукты, промышленные товары и другие биржевые активы.',
                    'uz' => 'Birjada: paxta va paxta tolasi, don ekinlari, moyli o\'simliklar, qimmatbaho metallar, neft mahsulotlari, sanoat tovarlari va boshqa birja aktivlari sotiladi.',
                    'en' => 'The exchange trades: cotton and cotton fiber, grains, oilseeds, precious metals, petroleum products, industrial goods, and other exchange assets.'
                ],
                'category' => 'commodities',
                'sort_order' => 5,
            ],
            [
                'question' => [
                    'ru' => 'Как связаться со службой поддержки?',
                    'uz' => 'Qo\'llab-quvvatlash xizmati bilan qanday bog\'lanish mumkin?',
                    'en' => 'How to contact support?'
                ],
                'answer' => [
                    'ru' => 'Вы можете обратиться по телефону горячей линии +998 71 200-00-01, написать на info@uzex.uz или посетить ближайший офис биржи.',
                    'uz' => 'Siz +998 71 200-00-01 ishonch telefoni orqali bog\'lanishingiz, info@uzex.uz manzilingizga yozishingiz yoki birjaning eng yaqin filialiga tashrif buyurishingiz mumkin.',
                    'en' => 'You can contact the hotline at +998 71 200-00-01, write to info@uzex.uz, or visit the nearest exchange office.'
                ],
                'category' => 'general',
                'sort_order' => 6,
            ],
            [
                'question' => [
                    'ru' => 'Есть ли комиссия за сделки?',
                    'uz' => 'Bitimlar uchun komissiya bormi?',
                    'en' => 'Is there a commission for transactions?'
                ],
                'answer' => [
                    'ru' => 'Да, биржа взимает комиссию за проведение сделок. Размер комиссии зависит от типа товара и объёма сделки. Подробности в разделе тарифов.',
                    'uz' => 'Ha, birja bitimlar o\'tkazgani uchun komissiya undiradi. Komissiya miqdori tovar turi va bitim hajmiga bog\'liq. Tafsilotlar tariflar bo\'limida.',
                    'en' => 'Yes, the exchange charges a commission for conducting transactions. The amount of commission depends on the type of commodity and the volume of the transaction. Details in the tariffs section.'
                ],
                'category' => 'general',
                'sort_order' => 7,
            ],
        ];

        foreach ($faqs as $faq) {
            Faq::create($faq);
        }
    }
}

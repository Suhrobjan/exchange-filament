<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DailyTradeResult;
use App\Models\TradeEvent;
use App\Models\Quote;
use App\Models\TradingSession;

class TradingDataSeeder extends Seeder
{
    public function run(): void
    {
        $this->seedTradingSessions();
        $this->seedDailyResults();
        $this->seedTradeEvents();
        $this->seedQuotes();
    }

    private function seedTradingSessions(): void
    {
        $sessions = [
            ['title' => ['ru' => 'Утренняя сессия', 'uz' => 'Ertalabki sessiya', 'en' => 'Morning session'], 'time' => '10:00 - 12:00', 'icon' => 'sun', 'sort_order' => 1, 'is_active' => true],
            ['title' => ['ru' => 'Дневная сессия', 'uz' => 'Kunduzgi sessiya', 'en' => 'Day session'], 'time' => '13:00 - 15:00', 'icon' => 'clock', 'sort_order' => 2, 'is_active' => true],
            ['title' => ['ru' => 'Вечерняя сессия', 'uz' => 'Kechki sessiya', 'en' => 'Evening session'], 'time' => '15:00 - 16:30', 'icon' => 'moon', 'sort_order' => 3, 'is_active' => true],
            ['title' => ['ru' => 'Клиринг', 'uz' => 'Kliring', 'en' => 'Clearing'], 'time' => '16:30 - 17:30', 'icon' => 'calculator', 'sort_order' => 4, 'is_active' => true],
        ];
        foreach ($sessions as $s) {
            TradingSession::updateOrCreate(['sort_order' => $s['sort_order']], $s);
        }
    }

    private function seedDailyResults(): void
    {
        DailyTradeResult::query()->delete();
        $commodities = ['Хлопок-волокно', 'Пшеница', 'Кукуруза', 'Медь', 'Нефть', 'Рис'];
        for ($i = 0; $i < 30; $i++) {
            DailyTradeResult::updateOrCreate(
                ['date' => now()->subDays($i)->format('Y-m-d')],
                [
                    'total_deals' => rand(150, 450),
                    'total_volume' => rand(50, 300) * 1000000000,
                    'top_commodity' => ['ru' => $commodities[array_rand($commodities)], 'uz' => 'Paxta tolasi', 'en' => 'Cotton fiber'],
                    'total_participants' => rand(40, 120),
                ]
            );
        }
    }

    private function seedTradeEvents(): void
    {
        $events = [
            ['title' => ['ru' => 'Аукцион: Хлопок-волокно', 'uz' => 'Auktsion: Paxta tolasi', 'en' => 'Auction: Cotton fiber'], 'event_date' => now()->addDays(1), 'start_time' => '10:00', 'end_time' => '12:00', 'category' => 'auction', 'is_holiday' => false],
            ['title' => ['ru' => 'Торговая сессия: Зерновые', 'uz' => 'Savdo sessiyasi: Don ekinlari', 'en' => 'Trading session: Grains'], 'event_date' => now()->addDays(1), 'start_time' => '13:00', 'end_time' => '15:00', 'category' => 'session', 'is_holiday' => false],
            ['title' => ['ru' => 'Клиринг и расчёты', 'uz' => 'Kliring va hisob-kitoblar', 'en' => 'Clearing and settlements'], 'event_date' => now()->addDays(1), 'start_time' => '16:00', 'end_time' => '17:00', 'category' => 'clearing', 'is_holiday' => false],
            ['title' => ['ru' => 'Аукцион: Металлы', 'uz' => 'Auktsion: Metallar', 'en' => 'Auction: Metals'], 'event_date' => now()->addDays(2), 'start_time' => '10:00', 'end_time' => '12:00', 'category' => 'auction', 'is_holiday' => false],
            ['title' => ['ru' => 'Торговая сессия: Нефтепродукты', 'uz' => 'Savdo sessiyasi: Neft mahsulotlari', 'en' => 'Trading session: Petroleum'], 'event_date' => now()->addDays(2), 'start_time' => '13:00', 'end_time' => '16:00', 'category' => 'session', 'is_holiday' => false],
            ['title' => ['ru' => 'Аукцион: Строительные материалы', 'uz' => 'Auktsion: Qurilish materiallari', 'en' => 'Auction: Construction materials'], 'event_date' => now()->addDays(3), 'start_time' => '10:00', 'end_time' => '14:00', 'category' => 'auction', 'is_holiday' => false],
            ['title' => ['ru' => 'Выходной — День Конституции', 'uz' => 'Dam olish kuni — Konstitutsiya kuni', 'en' => 'Holiday — Constitution Day'], 'event_date' => now()->addDays(5), 'start_time' => '00:00', 'end_time' => '23:59', 'category' => 'holiday', 'is_holiday' => true],
            ['title' => ['ru' => 'Специальный аукцион: Хлопок (экспорт)', 'uz' => 'Maxsus auktsion: Paxta (eksport)', 'en' => 'Special auction: Cotton (export)'], 'event_date' => now()->addDays(7), 'start_time' => '10:00', 'end_time' => '16:00', 'category' => 'auction', 'is_holiday' => false],
        ];
        TradeEvent::query()->delete();
        foreach ($events as $e) {
            TradeEvent::create($e);
        }
    }

    private function seedQuotes(): void
    {
        $quotes = [
            ['commodity_code' => 'COTT-01', 'commodity_name' => ['ru' => 'Хлопок-волокно 1 сорт', 'uz' => 'Paxta tolasi 1 nav', 'en' => 'Cotton fiber grade 1'], 'commodity_category' => 'cotton', 'price' => 85420000, 'price_usd' => 6650, 'currency' => 'UZS', 'unit' => ['ru' => 'тонна', 'uz' => 'tonna', 'en' => 'ton'], 'change_percent' => 1.2, 'change_absolute' => 1020000, 'min_price' => 82000000, 'max_price' => 88000000, 'trade_volume' => 15000, 'session_date' => now(), 'status' => 'active'],
            ['commodity_code' => 'COTT-02', 'commodity_name' => ['ru' => 'Хлопок-волокно 2 сорт', 'uz' => 'Paxta tolasi 2 nav', 'en' => 'Cotton fiber grade 2'], 'commodity_category' => 'cotton', 'price' => 72300000, 'price_usd' => 5630, 'currency' => 'UZS', 'unit' => ['ru' => 'тонна', 'uz' => 'tonna', 'en' => 'ton'], 'change_percent' => 0.8, 'change_absolute' => 570000, 'min_price' => 70000000, 'max_price' => 75000000, 'trade_volume' => 8000, 'session_date' => now(), 'status' => 'active'],
            ['commodity_code' => 'WHT-01', 'commodity_name' => ['ru' => 'Пшеница мягкая', 'uz' => 'Yumshoq bug\'doy', 'en' => 'Soft wheat'], 'commodity_category' => 'grain', 'price' => 6240000, 'price_usd' => 486, 'currency' => 'UZS', 'unit' => ['ru' => 'тонна', 'uz' => 'tonna', 'en' => 'ton'], 'change_percent' => 0.5, 'change_absolute' => 31000, 'min_price' => 6100000, 'max_price' => 6400000, 'trade_volume' => 28000, 'session_date' => now(), 'status' => 'active'],
            ['commodity_code' => 'CORN-01', 'commodity_name' => ['ru' => 'Кукуруза фуражная', 'uz' => 'Yemlik makkajo\'xori', 'en' => 'Feed corn'], 'commodity_category' => 'grain', 'price' => 4850000, 'price_usd' => 378, 'currency' => 'UZS', 'unit' => ['ru' => 'тонна', 'uz' => 'tonna', 'en' => 'ton'], 'change_percent' => 1.5, 'change_absolute' => 72000, 'min_price' => 4700000, 'max_price' => 5000000, 'trade_volume' => 18000, 'session_date' => now(), 'status' => 'active'],
            ['commodity_code' => 'RICE-01', 'commodity_name' => ['ru' => 'Рис шлифованный', 'uz' => 'Silliqlangan guruch', 'en' => 'Polished rice'], 'commodity_category' => 'grain', 'price' => 12300000, 'price_usd' => 958, 'currency' => 'UZS', 'unit' => ['ru' => 'тонна', 'uz' => 'tonna', 'en' => 'ton'], 'change_percent' => -0.2, 'change_absolute' => -25000, 'min_price' => 12000000, 'max_price' => 12600000, 'trade_volume' => 9000, 'session_date' => now(), 'status' => 'active'],
            ['commodity_code' => 'COP-01', 'commodity_name' => ['ru' => 'Медь катодная', 'uz' => 'Katod mis', 'en' => 'Cathode copper'], 'commodity_category' => 'metals', 'price' => 85400000, 'price_usd' => 8540, 'currency' => 'UZS', 'unit' => ['ru' => 'тонна', 'uz' => 'tonna', 'en' => 'ton'], 'change_percent' => 2.1, 'change_absolute' => 1750000, 'min_price' => 83000000, 'max_price' => 87000000, 'trade_volume' => 3500, 'session_date' => now(), 'status' => 'active'],
            ['commodity_code' => 'GOLD-01', 'commodity_name' => ['ru' => 'Золото (999)', 'uz' => 'Oltin (999)', 'en' => 'Gold (999)'], 'commodity_category' => 'metals', 'price' => 753000000, 'price_usd' => 58590, 'currency' => 'UZS', 'unit' => ['ru' => 'кг', 'uz' => 'kg', 'en' => 'kg'], 'change_percent' => 0.8, 'change_absolute' => 5970000, 'min_price' => 748000000, 'max_price' => 758000000, 'trade_volume' => 50, 'session_date' => now(), 'status' => 'active'],
            ['commodity_code' => 'OIL-01', 'commodity_name' => ['ru' => 'Нефть сырая', 'uz' => 'Xom neft', 'en' => 'Crude oil'], 'commodity_category' => 'oil', 'price' => 78950000, 'price_usd' => 6150, 'currency' => 'UZS', 'unit' => ['ru' => 'тонна', 'uz' => 'tonna', 'en' => 'ton'], 'change_percent' => -0.3, 'change_absolute' => -238000, 'min_price' => 77000000, 'max_price' => 80000000, 'trade_volume' => 12000, 'session_date' => now(), 'status' => 'active'],
            ['commodity_code' => 'SILK-01', 'commodity_name' => ['ru' => 'Шёлк-сырец', 'uz' => 'Xom ipak', 'en' => 'Raw silk'], 'commodity_category' => 'textile', 'price' => 450000000, 'price_usd' => 35040, 'currency' => 'UZS', 'unit' => ['ru' => 'тонна', 'uz' => 'tonna', 'en' => 'ton'], 'change_percent' => 0.0, 'change_absolute' => 0, 'min_price' => 445000000, 'max_price' => 455000000, 'trade_volume' => 800, 'session_date' => now(), 'status' => 'active'],
            ['commodity_code' => 'CEM-01', 'commodity_name' => ['ru' => 'Цемент М400', 'uz' => 'Tsement M400', 'en' => 'Cement M400'], 'commodity_category' => 'construction', 'price' => 1200000, 'price_usd' => 93, 'currency' => 'UZS', 'unit' => ['ru' => 'тонна', 'uz' => 'tonna', 'en' => 'ton'], 'change_percent' => 0.3, 'change_absolute' => 3600, 'min_price' => 1150000, 'max_price' => 1250000, 'trade_volume' => 45000, 'session_date' => now(), 'status' => 'active'],
        ];
        Quote::query()->delete();
        foreach ($quotes as $q) {
            Quote::create($q);
        }
    }
}

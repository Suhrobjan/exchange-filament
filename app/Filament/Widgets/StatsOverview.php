<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make(t('admin.total_news', 'Всего новостей'), \App\Models\News::count())
                ->description(t('admin.news_desc', 'Опубликованные новости'))
                ->descriptionIcon('heroicon-m-newspaper')
                ->color('success'),
            Stat::make(t('admin.total_announcements', 'Объявления'), \App\Models\Announcement::count())
                ->description(t('admin.announcements_desc', 'Актуальные объявления'))
                ->descriptionIcon('heroicon-m-megaphone')
                ->color('warning'),
            Stat::make(t('admin.total_brokers', 'Брокеры'), \App\Models\Broker::count())
                ->description(t('admin.brokers_desc', 'Участники торгов'))
                ->descriptionIcon('heroicon-m-user-group')
                ->color('info'),
            Stat::make(t('admin.total_quotes', 'Котировки'), \App\Models\Quote::count())
                ->description(t('admin.quotes_desc', 'Активные котировки'))
                ->descriptionIcon('heroicon-m-chart-bar')
                ->color('success'),
        ];
    }
}

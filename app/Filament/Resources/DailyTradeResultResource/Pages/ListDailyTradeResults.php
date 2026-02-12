<?php

namespace App\Filament\Resources\DailyTradeResultResource\Pages;

use App\Filament\Resources\DailyTradeResultResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDailyTradeResults extends ListRecords
{
    protected static string $resource = DailyTradeResultResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

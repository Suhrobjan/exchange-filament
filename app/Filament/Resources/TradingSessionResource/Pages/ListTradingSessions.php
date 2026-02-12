<?php

namespace App\Filament\Resources\TradingSessionResource\Pages;

use App\Filament\Resources\TradingSessionResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListTradingSessions extends ListRecords
{
    protected static string $resource = TradingSessionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}

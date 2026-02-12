<?php

namespace App\Filament\Resources\TradeEventResource\Pages;

use App\Filament\Resources\TradeEventResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTradeEvents extends ListRecords
{
    protected static string $resource = TradeEventResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

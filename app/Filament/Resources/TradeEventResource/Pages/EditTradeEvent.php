<?php

namespace App\Filament\Resources\TradeEventResource\Pages;

use App\Filament\Resources\TradeEventResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTradeEvent extends EditRecord
{
    protected static string $resource = TradeEventResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

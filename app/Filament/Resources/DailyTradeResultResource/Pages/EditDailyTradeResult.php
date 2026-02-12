<?php

namespace App\Filament\Resources\DailyTradeResultResource\Pages;

use App\Filament\Resources\DailyTradeResultResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDailyTradeResult extends EditRecord
{
    protected static string $resource = DailyTradeResultResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

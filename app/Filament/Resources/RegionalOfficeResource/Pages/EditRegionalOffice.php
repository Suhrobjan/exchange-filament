<?php

namespace App\Filament\Resources\RegionalOfficeResource\Pages;

use App\Filament\Resources\RegionalOfficeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRegionalOffice extends EditRecord
{
    protected static string $resource = RegionalOfficeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

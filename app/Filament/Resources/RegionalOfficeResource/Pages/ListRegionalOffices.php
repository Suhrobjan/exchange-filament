<?php

namespace App\Filament\Resources\RegionalOfficeResource\Pages;

use App\Filament\Resources\RegionalOfficeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRegionalOffices extends ListRecords
{
    protected static string $resource = RegionalOfficeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

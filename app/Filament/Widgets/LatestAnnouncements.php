<?php

namespace App\Filament\Widgets;

use App\Models\Announcement;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Actions\BulkActionGroup;
use Filament\Widgets\TableWidget;
use Illuminate\Database\Eloquent\Builder;

class LatestAnnouncements extends TableWidget
{
    public function table(Table $table): Table
    {
        return $table
            ->query(fn(): Builder => Announcement::query()->latest()->limit(5))
            ->columns([
                TextColumn::make('title')
                    ->label(t('admin.title', 'Заголовок'))
                    ->limit(50),
                TextColumn::make('type')
                    ->label(t('admin.type', 'Тип'))
                    ->badge(),
                TextColumn::make('published_at')
                    ->label(t('admin.date', 'Дата'))
                    ->date()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                //
            ])
            ->recordActions([
                //
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    //
                ]),
            ]);
    }
}

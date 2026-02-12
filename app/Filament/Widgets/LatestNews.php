<?php

namespace App\Filament\Widgets;

use Filament\Actions\BulkActionGroup;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;
use Illuminate\Database\Eloquent\Builder;
use App\Models\News;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;

class LatestNews extends TableWidget
{
    public function table(Table $table): Table
    {
        return $table
            ->query(fn(): Builder => News::query()->latest()->limit(5))
            ->columns([
                TextColumn::make('title')
                    ->label(t('admin.title', 'Заголовок'))
                    ->limit(50),
                TextColumn::make('category.name')
                    ->label(t('admin.category', 'Категория')),
                TextColumn::make('published_at')
                    ->label(t('admin.date', 'Дата'))
                    ->date()
                    ->sortable(),
                IconColumn::make('is_published')
                    ->label(t('admin.published', 'Опубл.'))
                    ->boolean(),
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

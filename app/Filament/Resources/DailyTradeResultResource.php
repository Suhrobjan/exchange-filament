<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DailyTradeResultResource\Pages;
use App\Models\DailyTradeResult;
use Filament\Forms\Components;
use Filament\Resources\Resource;
use Filament\Tables\Columns;
use Filament\Tables\Table;
use Filament\Schemas\Schema;
use Filament\Schemas\Components as Layout;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;

class DailyTradeResultResource extends Resource
{
    protected static ?string $model = DailyTradeResult::class;

    public static function getNavigationIcon(): ?string
    {
        return 'heroicon-o-presentation-chart-line';
    }

    public static function getNavigationGroup(): ?string
    {
        return 'Торговля';
    }

    public static function getModelLabel(): string
    {
        return 'Результат торгов';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Результаты торгов';
    }

    public static function form(Schema $form): Schema
    {
        return $form
            ->components([
                Layout\Section::make('Статистика за день')
                    ->schema([
                        Components\DatePicker::make('date')
                            ->label('Дата')
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->default(now()),

                        Components\TextInput::make('total_deals')
                            ->label('Всего сделок')
                            ->numeric()
                            ->required()
                            ->default(0),

                        Components\TextInput::make('total_volume')
                            ->label('Общий объём (UZS)')
                            ->numeric()
                            ->required()
                            ->default(0),

                        Components\TextInput::make('total_participants')
                            ->label('Участников')
                            ->numeric()
                            ->required()
                            ->default(0),
                    ])->columns(2),

                Layout\Section::make('Топ товар')
                    ->schema([
                        Layout\Tabs::make('Локализация Топа')
                            ->tabs([
                                Layout\Tabs\Tab::make('Русский')
                                    ->schema([
                                        Components\TextInput::make('top_commodity.ru')
                                            ->label('Название товара (RU)'),
                                    ]),
                                Layout\Tabs\Tab::make('O\'zbekcha')
                                    ->schema([
                                        Components\TextInput::make('top_commodity.uz')
                                            ->label('Nomi (UZ)'),
                                    ]),
                                Layout\Tabs\Tab::make('English')
                                    ->schema([
                                        Components\TextInput::make('top_commodity.en')
                                            ->label('Name (EN)'),
                                    ]),
                            ])->columnSpanFull(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Columns\TextColumn::make('date')
                    ->label('Дата')
                    ->date()
                    ->sortable(),

                Columns\TextColumn::make('total_deals')
                    ->label('Сделок')
                    ->sortable(),

                Columns\TextColumn::make('total_volume')
                    ->label('Объём (UZS)')
                    ->numeric()
                    ->sortable(),

                Columns\TextColumn::make('top_commodity')
                    ->label('Топ товар')
                    ->getStateUsing(fn($record) => $record->getTranslation('top_commodity', 'ru')),

                Columns\TextColumn::make('total_participants')
                    ->label('Участников'),
            ])
            ->defaultSort('date', 'desc')
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDailyTradeResults::route('/'),
            'create' => Pages\CreateDailyTradeResult::route('/create'),
            'edit' => Pages\EditDailyTradeResult::route('/{record}/edit'),
        ];
    }
}

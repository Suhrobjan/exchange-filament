<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TradingSessionResource\Pages;
use App\Models\TradingSession;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;
use Filament\Schemas\Components as Layout;

class TradingSessionResource extends Resource
{
    protected static ?string $model = TradingSession::class;

    public static function getNavigationIcon(): ?string
    {
        return 'heroicon-o-clock';
    }

    public static function getNavigationLabel(): string
    {
        return 'Торговые сессии';
    }

    public static function getModelLabel(): string
    {
        return 'Сессия';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Торговые сессии';
    }

    public static function getNavigationGroup(): ?string
    {
        return 'Контент';
    }

    public static function form(Schema $form): Schema
    {
        return $form
            ->components([
                Layout\Tabs::make('Локализация')
                    ->tabs([
                        Layout\Tabs\Tab::make('O\'zbekcha')
                            ->schema([
                                Components\TextInput::make('title.uz')
                                    ->label('Название (UZ)')
                                    ->required(),
                            ]),
                        Layout\Tabs\Tab::make('Русский')
                            ->schema([
                                Components\TextInput::make('title.ru')
                                    ->label('Название (RU)')
                                    ->required(),
                            ]),
                        Layout\Tabs\Tab::make('English')
                            ->schema([
                                Components\TextInput::make('title.en')
                                    ->label('Title (EN)'),
                            ]),
                    ])
                    ->columnSpanFull(),

                Layout\Section::make('Параметры сессии')
                    ->schema([
                        Components\TextInput::make('time')
                            ->label('Время проведения')
                            ->placeholder('напр. 10:00 - 16:00')
                            ->required(),

                        Components\Select::make('icon')
                            ->label('Иконка')
                            ->options([
                                'wheat' => 'Пшеница',
                                'cotton' => 'Хлопок',
                                'oil' => 'Нефтепродукты',
                                'metal' => 'Металлы',
                                'gas' => 'Газ',
                                'cement' => 'Цемент',
                                'bank' => 'Финансы',
                            ])
                            ->default('wheat')
                            ->required(),

                        Components\TextInput::make('sort_order')
                            ->label('Порядок сортировки')
                            ->numeric()
                            ->default(0),

                        Components\Toggle::make('is_active')
                            ->label('Активно')
                            ->default(true),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->label('Название')
                    ->searchable()
                    ->getStateUsing(fn($record) => $record->getTranslation('title', 'ru') ?: $record->getTranslation('title', 'uz')),

                TextColumn::make('time')
                    ->label('Время'),

                TextColumn::make('icon')
                    ->label('Иконка')
                    ->badge()
                    ->color('success'),

                ToggleColumn::make('is_active')
                    ->label('Активно'),

                TextColumn::make('sort_order')
                    ->label('Порядок')
                    ->sortable(),
            ])
            ->defaultSort('sort_order', 'asc')
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
            'index' => Pages\ListTradingSessions::route('/'),
            'create' => Pages\CreateTradingSession::route('/create'),
            'edit' => Pages\EditTradingSession::route('/{record}/edit'),
        ];
    }
}

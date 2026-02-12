<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TradeEventResource\Pages;
use App\Models\TradeEvent;
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

class TradeEventResource extends Resource
{
    protected static ?string $model = TradeEvent::class;

    public static function getNavigationIcon(): ?string
    {
        return 'heroicon-o-calendar-days';
    }

    public static function getNavigationGroup(): ?string
    {
        return 'Торговля';
    }

    public static function getModelLabel(): string
    {
        return 'Событие календаря';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Календарь торгов';
    }

    public static function form(Schema $form): Schema
    {
        return $form
            ->components([
                Layout\Tabs::make('Локализация')
                    ->tabs([
                        Layout\Tabs\Tab::make('Русский')
                            ->schema([
                                Components\TextInput::make('title.ru')
                                    ->label('Заголовок (RU)')
                                    ->required(),
                            ]),
                        Layout\Tabs\Tab::make('O\'zbekcha')
                            ->schema([
                                Components\TextInput::make('title.uz')
                                    ->label('Sarlavha (UZ)')
                                    ->required(),
                            ]),
                        Layout\Tabs\Tab::make('English')
                            ->schema([
                                Components\TextInput::make('title.en')
                                    ->label('Title (EN)'),
                            ]),
                    ])->columnSpanFull(),

                Layout\Section::make('Параметры события')
                    ->schema([
                        Components\DatePicker::make('event_date')
                            ->label('Дата')
                            ->required()
                            ->default(now()),

                        Components\Select::make('category')
                            ->label('Категория')
                            ->options([
                                'cotton' => 'Хлопок',
                                'metals' => 'Металлы',
                                'fuel' => 'Нефтепродукты',
                                'grain' => 'Зерновые',
                                'other' => 'Прочее',
                            ]),

                        Components\TimePicker::make('start_time')
                            ->label('Начало'),

                        Components\TimePicker::make('end_time')
                            ->label('Конец'),

                        Components\Toggle::make('is_holiday')
                            ->label('Выходной/Праздник')
                            ->default(false),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Columns\TextColumn::make('event_date')
                    ->label('Дата')
                    ->date()
                    ->sortable(),

                Columns\TextColumn::make('title')
                    ->label('Заголовок')
                    ->getStateUsing(fn($record) => $record->getTranslation('title', 'ru')),

                Columns\TextColumn::make('category')
                    ->label('Категория')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'cotton' => 'success',
                        'metals' => 'info',
                        'fuel' => 'warning',
                        'grain' => 'primary',
                        default => 'gray',
                    }),

                Columns\IconColumn::make('is_holiday')
                    ->label('Выходной')
                    ->boolean(),
            ])
            ->defaultSort('event_date', 'desc')
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
            'index' => Pages\ListTradeEvents::route('/'),
            'create' => Pages\CreateTradeEvent::route('/create'),
            'edit' => Pages\EditTradeEvent::route('/{record}/edit'),
        ];
    }
}

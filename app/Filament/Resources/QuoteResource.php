<?php

namespace App\Filament\Resources;

use App\Filament\Resources\QuoteResource\Pages;
use App\Models\Quote;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components;
use Filament\Schemas\Components as Layout;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class QuoteResource extends Resource
{
    protected static ?string $model = Quote::class;

    public static function getNavigationIcon(): ?string
    {
        return 'heroicon-o-chart-bar';
    }

    public static function getNavigationSort(): ?int
    {
        return 1;
    }

    public static function getNavigationLabel(): string
    {
        return 'Котировки';
    }

    public static function getModelLabel(): string
    {
        return 'Котировка';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Котировки';
    }

    public static function getNavigationGroup(): ?string
    {
        return 'Торговля';
    }

    public static function form(Schema $form): Schema
    {
        return $form
            ->components([
                Layout\Section::make('Основная информация')
                    ->schema([
                        Components\TextInput::make('commodity_code')
                            ->label('Код товара')
                            ->required()
                            ->unique(ignoreRecord: true),

                        Components\Select::make('commodity_category')
                            ->label('Категория')
                            ->options([
                                'agricultural' => 'Сельхозпродукция',
                                'industrial' => 'Промышленные товары',
                                'minerals' => 'Минералы и руды',
                                'energy' => 'Энергоносители',
                                'other' => 'Прочее',
                            ])
                            ->required(),

                        Components\Select::make('contract_type')
                            ->label('Тип контракта')
                            ->options([
                                'spot' => 'Спот',
                                'forward' => 'Форвард',
                                'futures' => 'Фьючерс',
                            ])
                            ->default('spot'),

                        Components\Select::make('unit')
                            ->label('Единица измерения')
                            ->options([
                                'kg' => 'Килограмм',
                                'ton' => 'Тонна',
                                'liter' => 'Литр',
                                'piece' => 'Штука',
                            ])
                            ->required(),
                    ])
                    ->columns(2),

                Layout\Tabs::make('Названия')
                    ->tabs([
                        Layout\Tabs\Tab::make('O\'zbekcha')
                            ->schema([
                                Components\TextInput::make('commodity_name.uz')
                                    ->label('Название (UZ)')
                                    ->required(),
                                Components\TextInput::make('origin.uz')
                                    ->label('Происхождение (UZ)'),
                                Components\TextInput::make('quality_standard.uz')
                                    ->label('Стандарт качества (UZ)'),
                                Components\TextInput::make('delivery_terms.uz')
                                    ->label('Условия поставки (UZ)'),
                            ]),
                        Layout\Tabs\Tab::make('Русский')
                            ->schema([
                                Components\TextInput::make('commodity_name.ru')
                                    ->label('Название (RU)')
                                    ->required(),
                                Components\TextInput::make('origin.ru')
                                    ->label('Происхождение (RU)'),
                                Components\TextInput::make('quality_standard.ru')
                                    ->label('Стандарт качества (RU)'),
                                Components\TextInput::make('delivery_terms.ru')
                                    ->label('Условия поставки (RU)'),
                            ]),
                        Layout\Tabs\Tab::make('English')
                            ->schema([
                                Components\TextInput::make('commodity_name.en')
                                    ->label('Name (EN)'),
                                Components\TextInput::make('origin.en')
                                    ->label('Origin (EN)'),
                                Components\TextInput::make('quality_standard.en')
                                    ->label('Quality Standard (EN)'),
                                Components\TextInput::make('delivery_terms.en')
                                    ->label('Delivery Terms (EN)'),
                            ]),
                    ])
                    ->columnSpanFull(),

                Layout\Section::make('Цены и объемы')
                    ->schema([
                        Components\TextInput::make('price')
                            ->label('Текущая цена')
                            ->numeric()
                            ->prefix('UZS'),

                        Components\TextInput::make('price_change')
                            ->label('Изменение цены')
                            ->numeric(),

                        Components\TextInput::make('price_change_percent')
                            ->label('Изменение %')
                            ->numeric(),

                        Components\TextInput::make('min_price')
                            ->label('Мин. цена')
                            ->numeric(),

                        Components\TextInput::make('max_price')
                            ->label('Макс. цена')
                            ->numeric(),

                        Components\TextInput::make('volume')
                            ->label('Объем')
                            ->numeric(),

                        Components\TextInput::make('deals_count')
                            ->label('Кол-во сделок')
                            ->numeric(),

                        Components\DatePicker::make('quote_date')
                            ->label('Дата котировки')
                            ->default(now()),
                    ])
                    ->columns(4),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('commodity_code')
                    ->label('Код')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('commodity_name')
                    ->label('Товар')
                    ->searchable()
                    ->getStateUsing(fn($record) => $record->getTranslation('commodity_name', 'ru')),

                TextColumn::make('commodity_category')
                    ->label('Категория')
                    ->badge()
                    ->formatStateUsing(fn(string $state): string => match ($state) {
                        'agricultural' => 'Сельхоз',
                        'industrial' => 'Промышленность',
                        'minerals' => 'Минералы',
                        'energy' => 'Энергия',
                        default => $state,
                    }),

                TextColumn::make('price')
                    ->label('Цена')
                    ->money('UZS')
                    ->sortable(),

                TextColumn::make('price_change_percent')
                    ->label('Изменение')
                    ->suffix('%')
                    ->color(fn($state) => $state > 0 ? 'success' : ($state < 0 ? 'danger' : 'gray')),

                TextColumn::make('volume')
                    ->label('Объем')
                    ->numeric(),

                TextColumn::make('quote_date')
                    ->label('Дата')
                    ->date('d.m.Y')
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('commodity_category')
                    ->label('Категория')
                    ->options([
                        'agricultural' => 'Сельхозпродукция',
                        'industrial' => 'Промышленные',
                        'minerals' => 'Минералы',
                        'energy' => 'Энергоносители',
                    ]),

                SelectFilter::make('contract_type')
                    ->options([
                        'spot' => 'Спот',
                        'forward' => 'Форвард',
                        'futures' => 'Фьючерс',
                    ]),
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->defaultSort('quote_date', 'desc');
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListQuotes::route('/'),
            'create' => Pages\CreateQuote::route('/create'),
            'edit' => Pages\EditQuote::route('/{record}/edit'),
        ];
    }
}

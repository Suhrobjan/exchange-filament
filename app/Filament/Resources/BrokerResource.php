<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BrokerResource\Pages;
use App\Models\Broker;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components;
use Illuminate\Support\Str;
use Filament\Schemas\Components as Layout;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;

class BrokerResource extends Resource
{
    protected static ?string $model = Broker::class;

    public static function getNavigationIcon(): ?string
    {
        return 'heroicon-o-building-office';
    }

    public static function getNavigationSort(): ?int
    {
        return 2;
    }

    public static function getNavigationLabel(): string
    {
        return 'Брокеры';
    }

    public static function getModelLabel(): string
    {
        return 'Брокер';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Брокеры';
    }

    public static function getNavigationGroup(): ?string
    {
        return 'Торговля';
    }

    public static function form(Schema $form): Schema
    {
        return $form
            ->components([
                Layout\Tabs::make('Локализация')
                    ->tabs([
                        Layout\Tabs\Tab::make('O\'zbekcha')
                            ->schema([
                                Components\TextInput::make('name.uz')
                                    ->label('Название (UZ)')
                                    ->required(),
                                Components\Textarea::make('description.uz')
                                    ->label('Описание (UZ)')
                                    ->rows(3),
                                Components\TextInput::make('address.uz')
                                    ->label('Адрес (UZ)'),
                            ]),
                        Layout\Tabs\Tab::make('Русский')
                            ->schema([
                                Components\TextInput::make('name.ru')
                                    ->label('Название (RU)')
                                    ->required()
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(fn($set, ?string $state) => $set('slug', Str::slug($state))),
                                Components\Textarea::make('description.ru')
                                    ->label('Описание (RU)')
                                    ->rows(3),
                                Components\TextInput::make('address.ru')
                                    ->label('Адрес (RU)'),
                            ]),
                        Layout\Tabs\Tab::make('English')
                            ->schema([
                                Components\TextInput::make('name.en')
                                    ->label('Name (EN)'),
                                Components\Textarea::make('description.en')
                                    ->label('Description (EN)')
                                    ->rows(3),
                                Components\TextInput::make('address.en')
                                    ->label('Address (EN)'),
                            ]),
                    ])
                    ->columnSpanFull(),

                Layout\Section::make('Контактные данные')
                    ->schema([
                        Components\TextInput::make('slug')
                            ->label('URL (slug)')
                            ->required()
                            ->unique(ignoreRecord: true),

                        Components\TextInput::make('license_number')
                            ->label('Номер лицензии')
                            ->required()
                            ->unique(ignoreRecord: true),

                        Components\TextInput::make('phone')
                            ->label('Телефон')
                            ->tel(),

                        Components\TextInput::make('email')
                            ->label('Email')
                            ->email(),

                        Components\TextInput::make('website')
                            ->label('Веб-сайт')
                            ->url(),

                        Components\TextInput::make('contact_person')
                            ->label('Контактное лицо'),

                        Components\FileUpload::make('logo')
                            ->label('Логотип')
                            ->image()
                            ->disk('cloudinary')
                            ->directory('brokers')
                            ->visibility('public'),

                        Components\TextInput::make('rating')
                            ->label('Рейтинг (1-5)')
                            ->numeric()
                            ->minValue(1)
                            ->maxValue(5)
                            ->default(5),

                        Components\TagsInput::make('tags')
                            ->label('Теги (категории товаров)')
                            ->placeholder('Хлопок, Металл...'),
                    ])
                    ->columns(2),

                Layout\Section::make('Статус')
                    ->schema([
                        Components\Toggle::make('is_active')
                            ->label('Активен')
                            ->default(true),

                        Components\Toggle::make('is_verified')
                            ->label('Верифицирован'),

                        Components\Toggle::make('is_top')
                            ->label('ТОП Брокер'),

                        Components\TextInput::make('sort_order')
                            ->label('Сортировка')
                            ->numeric()
                            ->default(0),
                    ])
                    ->columns(3),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('logo')
                    ->label('Лого')
                    ->circular()
                    ->url(fn($record) => $record->logo),

                TextColumn::make('name')
                    ->label('Название')
                    ->searchable()
                    ->getStateUsing(fn($record) => $record->getTranslation('name', 'ru')),

                TextColumn::make('license_number')
                    ->label('Лицензия')
                    ->searchable(),

                TextColumn::make('phone')
                    ->label('Телефон'),

                IconColumn::make('is_active')
                    ->label('Активен')
                    ->boolean(),

                IconColumn::make('is_verified')
                    ->label('Вер.')
                    ->boolean(),

                IconColumn::make('is_top')
                    ->label('ТОП')
                    ->boolean(),

                TextColumn::make('rating')
                    ->label('Рейтинг')
                    ->sortable(),
            ])
            ->filters([
                TernaryFilter::make('is_active')
                    ->label('Активен'),
                TernaryFilter::make('is_verified')
                    ->label('Верифицирован'),
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('sort_order');
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBrokers::route('/'),
            'create' => Pages\CreateBroker::route('/create'),
            'edit' => Pages\EditBroker::route('/{record}/edit'),
        ];
    }
}

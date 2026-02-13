<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RegionalOfficeResource\Pages;
use App\Models\RegionalOffice;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components;
use Filament\Schemas\Components as Layout;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;

class RegionalOfficeResource extends Resource
{
    protected static ?string $model = RegionalOffice::class;

    public static function getNavigationIcon(): ?string
    {
        return 'heroicon-o-map-pin';
    }

    public static function getNavigationSort(): ?int
    {
        return 1;
    }

    public static function getNavigationLabel(): string
    {
        return 'Региональные офисы';
    }

    public static function getModelLabel(): string
    {
        return 'Офис';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Региональные офисы';
    }

    public static function getNavigationGroup(): ?string
    {
        return 'Контакты';
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
                                Components\TextInput::make('address.uz')
                                    ->label('Адрес (UZ)'),
                                Components\TextInput::make('manager_name.uz')
                                    ->label('ФИО руководителя (UZ)'),
                                Components\TextInput::make('manager_position.uz')
                                    ->label('Должность руководителя (UZ)'),
                            ]),
                        Layout\Tabs\Tab::make('Русский')
                            ->schema([
                                Components\TextInput::make('name.ru')
                                    ->label('Название (RU)')
                                    ->required(),
                                Components\TextInput::make('address.ru')
                                    ->label('Адрес (RU)'),
                                Components\TextInput::make('manager_name.ru')
                                    ->label('ФИО руководителя (RU)'),
                                Components\TextInput::make('manager_position.ru')
                                    ->label('Должность руководителя (RU)'),
                            ]),
                        Layout\Tabs\Tab::make('English')
                            ->schema([
                                Components\TextInput::make('name.en')
                                    ->label('Name (EN)'),
                                Components\TextInput::make('address.en')
                                    ->label('Address (EN)'),
                                Components\TextInput::make('manager_name.en')
                                    ->label('Manager Name (EN)'),
                                Components\TextInput::make('manager_position.en')
                                    ->label('Manager Position (EN)'),
                            ]),
                    ])
                    ->columnSpanFull(),

                Layout\Section::make('Контактные данные')
                    ->schema([
                        Components\TextInput::make('phone')
                            ->label('Телефон')
                            ->tel()
                            ->required(),

                        Components\TextInput::make('email')
                            ->label('Email')
                            ->email(),

                        Components\TextInput::make('working_hours')
                            ->label('Часы работы'),

                        Components\FileUpload::make('manager_photo')
                            ->label('Фото руководителя')
                            ->image()
                            ->disk('cloudinary')
                            ->visibility('public')
                            ->directory('managers')
                            ->avatar(),
                    ])
                    ->columns(2),

                Layout\Section::make('Координаты')
                    ->schema([
                        Components\TextInput::make('latitude')
                            ->label('Широта')
                            ->numeric()
                            ->step(0.000001),

                        Components\TextInput::make('longitude')
                            ->label('Долгота')
                            ->numeric()
                            ->step(0.000001),
                    ])
                    ->columns(2),

                Layout\Section::make('Настройки')
                    ->schema([
                        Components\TextInput::make('region_code')
                            ->label('Код региона (напр. UZ-TK)')
                            ->required(),

                        Components\Toggle::make('is_active')
                            ->label('Активен')
                            ->default(true),

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
                TextColumn::make('name')
                    ->label('Название')
                    ->searchable()
                    ->getStateUsing(fn($record) => $record->getTranslation('name', 'ru')),

                TextColumn::make('region_code')
                    ->label('Код региона')
                    ->searchable(),

                TextColumn::make('phone')
                    ->label('Телефон'),

                IconColumn::make('is_active')
                    ->label('Активен')
                    ->boolean(),
            ])
            ->filters([
                TernaryFilter::make('is_active')
                    ->label('Активен'),
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRegionalOffices::route('/'),
            'create' => Pages\CreateRegionalOffice::route('/create'),
            'edit' => Pages\EditRegionalOffice::route('/{record}/edit'),
        ];
    }
}

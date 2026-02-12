<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SettingResource\Pages;
use App\Models\Setting;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components;
use Filament\Schemas\Components as Layout;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Table;

class SettingResource extends Resource
{
    protected static ?string $model = Setting::class;

    public static function getNavigationIcon(): ?string
    {
        return 'heroicon-o-cog-6-tooth';
    }

    public static function getNavigationGroup(): ?string
    {
        return 'Система';
    }

    public static function getNavigationLabel(): string
    {
        return 'Настройки';
    }

    public static function getModelLabel(): string
    {
        return 'Настройка';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Настройки';
    }

    public static function form(Schema $form): Schema
    {
        return $form
            ->components([
                Layout\Section::make()
                    ->schema([
                        Components\TextInput::make('group')
                            ->label('Группа')
                            ->required(),
                        Components\TextInput::make('key')
                            ->label('Ключ')
                            ->required()
                            ->unique(ignoreRecord: true),
                        Components\TextInput::make('type')
                            ->label('Тип')
                            ->required()
                            ->default('text'),

                        // Handle localized value
                        Layout\Tabs::make('Value')
                            ->tabs([
                                Layout\Tabs\Tab::make('Русский')
                                    ->schema([
                                        Components\Textarea::make('value.ru')
                                            ->label('Значение (RU)')
                                            ->rows(3),
                                    ]),
                                Layout\Tabs\Tab::make('O\'zbekcha')
                                    ->schema([
                                        Components\Textarea::make('value.uz')
                                            ->label('Значение (UZ)')
                                            ->rows(3),
                                    ]),
                                Layout\Tabs\Tab::make('English')
                                    ->schema([
                                        Components\Textarea::make('value.en')
                                            ->label('Значение (EN)')
                                            ->rows(3),
                                    ]),
                            ])
                            ->columnSpanFull(),
                    ])
                    ->columns(3),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('group')
                    ->label('Группа')
                    ->searchable()
                    ->sortable()
                    ->badge(),
                Tables\Columns\TextColumn::make('key')
                    ->label('Ключ')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('value')
                    ->label('Значение (RU)')
                    ->getStateUsing(fn($record) => $record->getTranslation('value', 'ru'))
                    ->limit(50),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('group')
                    ->label('Группа')
                    ->options(fn() => Setting::distinct()->pluck('group', 'group')->toArray()),
            ])
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
            'index' => Pages\ListSettings::route('/'),
            'create' => Pages\CreateSetting::route('/create'),
            'edit' => Pages\EditSetting::route('/{record}/edit'),
        ];
    }
}

<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MenuItemResource\Pages;
use App\Models\MenuItem;
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

class MenuItemResource extends Resource
{
    protected static ?string $model = MenuItem::class;

    public static function getNavigationIcon(): ?string
    {
        return 'heroicon-o-bars-3';
    }

    public static function getNavigationLabel(): string
    {
        return 'Навигация';
    }

    public static function getModelLabel(): string
    {
        return 'Пункт меню';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Навигация';
    }

    public static function getNavigationGroup(): ?string
    {
        return 'Настройки';
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
                                Components\Textarea::make('description.uz')
                                    ->label('Описание (UZ) - для мега-меню')
                                    ->rows(2),
                            ]),
                        Layout\Tabs\Tab::make('Русский')
                            ->schema([
                                Components\TextInput::make('title.ru')
                                    ->label('Название (RU)')
                                    ->required(),
                                Components\Textarea::make('description.ru')
                                    ->label('Описание (RU) - для мега-меню')
                                    ->rows(2),
                            ]),
                        Layout\Tabs\Tab::make('English')
                            ->schema([
                                Components\TextInput::make('title.en')
                                    ->label('Title (EN)'),
                                Components\Textarea::make('description.en')
                                    ->label('Description (EN)')
                                    ->rows(2),
                            ]),
                    ])
                    ->columnSpanFull(),

                Layout\Section::make('Настройки ссылки')
                    ->schema([
                        Components\TextInput::make('url')
                            ->label('URL или маршрут')
                            ->placeholder('напр. /about или news')
                            ->required(),

                        Components\Select::make('parent_id')
                            ->label('Родительский пункт')
                            ->options(MenuItem::whereNull('parent_id')->pluck('title', 'id'))
                            ->searchable()
                            ->placeholder('Верхний уровень'),

                        Components\TextInput::make('icon')
                            ->label('Иконка (Heroicon или имя)')
                            ->placeholder('heroicon-o-home'),

                        Components\Select::make('target')
                            ->label('Открыть в')
                            ->options([
                                '_self' => 'Том же окне',
                                '_blank' => 'Новом окне',
                            ])
                            ->default('_self'),

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

                TextColumn::make('parent.title')
                    ->label('Родитель')
                    ->placeholder('Верхний уровень')
                    ->getStateUsing(fn($record) => $record->parent?->getTranslation('title', 'ru') ?: $record->parent?->getTranslation('title', 'uz')),

                TextColumn::make('url')
                    ->label('URL'),

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
            'index' => Pages\ListMenuItems::route('/'),
            'create' => Pages\CreateMenuItem::route('/create'),
            'edit' => Pages\EditMenuItem::route('/{record}/edit'),
        ];
    }
}

<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TranslationResource\Pages;
use App\Models\Translation;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\BulkActionGroup;
use Filament\Forms\Components;
use Filament\Schemas\Components as Layout;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class TranslationResource extends Resource
{
    protected static ?string $model = Translation::class;

    public static function getNavigationIcon(): ?string
    {
        return 'heroicon-o-language';
    }

    public static function getNavigationSort(): ?int
    {
        return 10;
    }

    public static function getNavigationLabel(): string
    {
        return 'Переводы UI';
    }

    public static function getModelLabel(): string
    {
        return 'Перевод';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Переводы UI';
    }

    public static function getNavigationGroup(): ?string
    {
        return 'Настройки';
    }

    public static function form(Schema $form): Schema
    {
        return $form
            ->components([
                Layout\Split::make([
                    Layout\Section::make([
                        Components\TextInput::make('group')
                            ->label('Группа')
                            ->required()
                            ->placeholder('header, footer, home, common, pages'),

                        Components\TextInput::make('key')
                            ->label('Ключ')
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->placeholder('home.popular_commodities'),
                    ]),
                ]),

                Layout\Section::make('Переводы')
                    ->schema([
                        Components\TextInput::make('text.uz')
                            ->label('🇺🇿 O\'zbekcha')
                            ->required(),

                        Components\TextInput::make('text.ru')
                            ->label('🇷🇺 Русский')
                            ->required(),

                        Components\TextInput::make('text.en')
                            ->label('🇬🇧 English')
                            ->required(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('group')
                    ->label('Группа')
                    ->badge()
                    ->sortable()
                    ->searchable(),

                TextColumn::make('key')
                    ->label('Ключ')
                    ->searchable()
                    ->copyable()
                    ->weight('bold'),

                TextColumn::make('text')
                    ->label('🇺🇿 UZ')
                    ->getStateUsing(fn($record) => $record->getTranslation('text', 'uz'))
                    ->limit(40)
                    ->wrap(),

                TextColumn::make('text_ru')
                    ->label('🇷🇺 RU')
                    ->getStateUsing(fn($record) => $record->getTranslation('text', 'ru'))
                    ->limit(40)
                    ->wrap(),

                TextColumn::make('text_en')
                    ->label('🇬🇧 EN')
                    ->getStateUsing(fn($record) => $record->getTranslation('text', 'en'))
                    ->limit(40)
                    ->wrap(),
            ])
            ->filters([
                SelectFilter::make('group')
                    ->label('Группа')
                    ->options([
                        'topbar' => 'Topbar',
                        'header' => 'Header',
                        'footer' => 'Footer',
                        'home' => 'Главная',
                        'pages' => 'Страницы',
                        'common' => 'Общее',
                    ]),
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
            ->defaultSort('group');
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTranslations::route('/'),
            'create' => Pages\CreateTranslation::route('/create'),
            'edit' => Pages\EditTranslation::route('/{record}/edit'),
        ];
    }
}

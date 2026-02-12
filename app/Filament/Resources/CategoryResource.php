<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CategoryResource\Pages;
use App\Models\Category;
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
use Illuminate\Support\Str;

class CategoryResource extends Resource
{
    protected static ?string $model = Category::class;

    public static function getNavigationIcon(): ?string
    {
        return 'heroicon-o-tag';
    }

    public static function getNavigationGroup(): ?string
    {
        return 'Контент';
    }

    public static function getModelLabel(): string
    {
        return 'Категория';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Категории';
    }

    public static function form(Schema $form): Schema
    {
        return $form
            ->components([
                Layout\Tabs::make('Локализация')
                    ->tabs([
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
                            ]),
                        Layout\Tabs\Tab::make('O\'zbekcha')
                            ->schema([
                                Components\TextInput::make('name.uz')
                                    ->label('Nomi (UZ)')
                                    ->required(),
                                Components\Textarea::make('description.uz')
                                    ->label('Tavsif (UZ)')
                                    ->rows(3),
                            ]),
                        Layout\Tabs\Tab::make('English')
                            ->schema([
                                Components\TextInput::make('name.en')
                                    ->label('Name (EN)'),
                                Components\Textarea::make('description.en')
                                    ->label('Description (EN)')
                                    ->rows(3),
                            ]),
                    ])->columnSpanFull(),

                Layout\Section::make('Настройки')
                    ->schema([
                        Components\TextInput::make('slug')
                            ->label('URL (slug)')
                            ->required()
                            ->unique(ignoreRecord: true),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Columns\TextColumn::make('name')
                    ->label('Название')
                    ->searchable()
                    ->getStateUsing(fn($record) => $record->getTranslation('name', 'ru')),

                Columns\TextColumn::make('slug')
                    ->label('URL')
                    ->searchable(),

                Columns\TextColumn::make('news_count')
                    ->label('Кол-во новостей')
                    ->counts('news'),
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
            'index' => Pages\ListCategories::route('/'),
            'create' => Pages\CreateCategory::route('/create'),
            'edit' => Pages\EditCategory::route('/{record}/edit'),
        ];
    }
}

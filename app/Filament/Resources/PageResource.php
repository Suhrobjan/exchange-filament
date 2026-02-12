<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PageResource\Pages;
use App\Models\Page;
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
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;

class PageResource extends Resource
{
    protected static ?string $model = Page::class;

    public static function getNavigationIcon(): ?string
    {
        return 'heroicon-o-document-text';
    }

    public static function getNavigationSort(): ?int
    {
        return 1;
    }

    public static function getNavigationLabel(): string
    {
        return 'Страницы';
    }

    public static function getModelLabel(): string
    {
        return 'Страница';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Страницы';
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
                                    ->label('Заголовок (UZ)')
                                    ->required(),
                                Components\RichEditor::make('content.uz')
                                    ->label('Контент (UZ)')
                                    ->columnSpanFull(),
                            ]),
                        Layout\Tabs\Tab::make('Русский')
                            ->schema([
                                Components\TextInput::make('title.ru')
                                    ->label('Заголовок (RU)')
                                    ->required()
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(fn($set, ?string $state) => $set('slug', Str::slug($state))),
                                Components\RichEditor::make('content.ru')
                                    ->label('Контент (RU)')
                                    ->columnSpanFull(),
                            ]),
                        Layout\Tabs\Tab::make('English')
                            ->schema([
                                Components\TextInput::make('title.en')
                                    ->label('Title (EN)')
                                    ->required(),
                                Components\RichEditor::make('content.en')
                                    ->label('Content (EN)')
                                    ->columnSpanFull(),
                            ]),
                    ])
                    ->columnSpanFull(),

                Layout\Section::make('Настройки')
                    ->schema([
                        Components\TextInput::make('slug')
                            ->label('URL (slug)')
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->maxLength(255),

                        Components\Select::make('template')
                            ->label('Шаблон')
                            ->options([
                                'default' => 'Стандартный',
                                'home' => 'Главная',
                                'about' => 'О бирже',
                                'contacts' => 'Контакты',
                                'accreditation' => 'Аккредитация',
                                'quotes' => 'Котировки',
                                'faq' => 'FAQ',
                            ])
                            ->default('default'),

                        Components\Toggle::make('is_published')
                            ->label('Опубликовано')
                            ->default(true),

                        Components\TextInput::make('sort_order')
                            ->label('Сортировка')
                            ->numeric()
                            ->default(0),
                    ])
                    ->columns(2),

                Layout\Section::make('SEO')
                    ->schema([
                        Components\TextInput::make('meta_title.ru')
                            ->label('Meta Title (RU)')
                            ->maxLength(70),
                        Components\Textarea::make('meta_description.ru')
                            ->label('Meta Description (RU)')
                            ->rows(2)
                            ->maxLength(160),
                    ])
                    ->collapsed(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->label('Заголовок')
                    ->searchable()
                    ->sortable()
                    ->getStateUsing(fn($record) => $record->getTranslation('title', 'ru') ?: $record->getTranslation('title', 'uz')),

                TextColumn::make('slug')
                    ->label('URL')
                    ->searchable(),

                TextColumn::make('template')
                    ->label('Шаблон')
                    ->badge(),

                IconColumn::make('is_published')
                    ->label('Опубликовано')
                    ->boolean(),

                TextColumn::make('updated_at')
                    ->label('Обновлено')
                    ->dateTime('d.m.Y H:i')
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('template')
                    ->options([
                        'default' => 'Стандартный',
                        'home' => 'Главная',
                        'about' => 'О бирже',
                    ]),
                TernaryFilter::make('is_published')
                    ->label('Опубликовано'),
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
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
            'index' => Pages\ListPages::route('/'),
            'create' => Pages\CreatePage::route('/create'),
            'edit' => Pages\EditPage::route('/{record}/edit'),
        ];
    }
}

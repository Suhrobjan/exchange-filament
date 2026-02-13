<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NewsResource\Pages;
use App\Models\News;
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

class NewsResource extends Resource
{
    protected static ?string $model = News::class;

    public static function getNavigationIcon(): ?string
    {
        return 'heroicon-o-newspaper';
    }

    public static function getNavigationSort(): ?int
    {
        return 2;
    }

    public static function getNavigationLabel(): string
    {
        return 'Новости';
    }

    public static function getModelLabel(): string
    {
        return 'Новость';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Новости';
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
                                Components\Textarea::make('excerpt.uz')
                                    ->label('Краткое описание (UZ)')
                                    ->rows(2),
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
                                Components\Textarea::make('excerpt.ru')
                                    ->label('Краткое описание (RU)')
                                    ->rows(2),
                                Components\RichEditor::make('content.ru')
                                    ->label('Контент (RU)')
                                    ->columnSpanFull(),
                            ]),
                        Layout\Tabs\Tab::make('English')
                            ->schema([
                                Components\TextInput::make('title.en')
                                    ->label('Title (EN)'),
                                Components\Textarea::make('excerpt.en')
                                    ->label('Excerpt (EN)')
                                    ->rows(2),
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
                            ->unique(ignoreRecord: true),

                        Components\FileUpload::make('image')
                            ->label('Изображение')
                            ->image()
                            ->disk('cloudinary')
                            ->visibility('public')
                            ->directory('news')
                            ->imageResizeMode('cover')
                            ->imageCropAspectRatio('16:9'),

                        Components\Select::make('category_id')
                            ->label('Категория')
                            ->relationship('category', 'name')
                            ->getOptionLabelFromRecordUsing(fn($record) => $record->getTranslation('name', 'ru'))
                            ->searchable()
                            ->preload(),

                        Components\DateTimePicker::make('published_at')
                            ->label('Дата публикации')
                            ->default(now()),

                        Components\Toggle::make('is_published')
                            ->label('Опубликовано')
                            ->default(true),

                        Components\Toggle::make('is_featured')
                            ->label('Избранное'),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')
                    ->label('Фото')
                    ->circular()
                    ->url(fn($record) => $record->image),

                TextColumn::make('title')
                    ->label('Заголовок')
                    ->searchable()
                    ->getStateUsing(fn($record) => $record->getTranslation('title', 'ru') ?: $record->getTranslation('title', 'uz')),

                TextColumn::make('category.name')
                    ->label('Категория')
                    ->getStateUsing(fn($record) => $record->category?->getTranslation('name', 'ru'))
                    ->searchable(),

                IconColumn::make('is_featured')
                    ->label('Избранное')
                    ->boolean(),

                IconColumn::make('is_published')
                    ->label('Опубликовано')
                    ->boolean(),

                TextColumn::make('published_at')
                    ->label('Дата')
                    ->dateTime('d.m.Y')
                    ->sortable(),
            ])
            ->filters([
                TernaryFilter::make('is_published')
                    ->label('Опубликовано'),
                TernaryFilter::make('is_featured')
                    ->label('Избранное'),
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
            ->defaultSort('published_at', 'desc');
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListNews::route('/'),
            'create' => Pages\CreateNews::route('/create'),
            'edit' => Pages\EditNews::route('/{record}/edit'),
        ];
    }
}

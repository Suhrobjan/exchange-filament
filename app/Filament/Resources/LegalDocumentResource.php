<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LegalDocumentResource\Pages;
use App\Models\LegalDocument;
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
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class LegalDocumentResource extends Resource
{
    protected static ?string $model = LegalDocument::class;

    public static function getNavigationIcon(): ?string
    {
        return 'heroicon-o-document-text';
    }

    public static function getNavigationSort(): ?int
    {
        return 4;
    }

    public static function getNavigationLabel(): string
    {
        return 'Нормативные документы';
    }

    public static function getModelLabel(): string
    {
        return 'Нормативный документ';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Нормативные документы';
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
                                    ->label('Название (UZ)')
                                    ->required(),
                                Components\Textarea::make('description.uz')
                                    ->label('Описание (UZ)')
                                    ->rows(2),
                            ]),
                        Layout\Tabs\Tab::make('Русский')
                            ->schema([
                                Components\TextInput::make('title.ru')
                                    ->label('Название (RU)')
                                    ->required(),
                                Components\Textarea::make('description.ru')
                                    ->label('Описание (RU)')
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

                Layout\Section::make('Детали документа и настройки')
                    ->schema([
                        Components\Select::make('type')
                            ->label('Тип документа')
                            ->options([
                                'law' => 'ЗАКОН РЕСПУБЛИКИ УЗБЕКИСТАН',
                                'decree' => 'УКАЗ ПРЕЗИДЕНТА РЕСПУБЛИКИ УЗБЕКИСТАН',
                                'resolution_president' => 'ПОСТАНОВЛЕНИЕ ПРЕЗИДЕНТА РЕСПУБЛИКИ УЗБЕКИСТАН',
                                'resolution_cabinet' => 'ПОСТАНОВЛЕНИЕ КАБИНЕТА МИНИСТРОВ РЕСПУБЛИКИ УЗБЕКИСТАН',
                                'justice_ministry' => 'НОРМАТИВНО-ПРАВОВОЙ АКТ МИНЮСТА РУз',
                                'other' => 'Прочее',
                            ])
                            ->required(),

                        Components\TextInput::make('document_number')
                            ->label('Номер документа'),

                        Components\DatePicker::make('adopted_at')
                            ->label('Дата принятия'),

                        Components\TextInput::make('url')
                            ->label('Ссылка (Lex.uz)')
                            ->url(),

                        Components\Toggle::make('is_active')
                            ->label('Активен')
                            ->default(true),

                        Components\TextInput::make('sort_order')
                            ->label('Сортировка')
                            ->numeric()
                            ->default(0),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('type')
                    ->label('Тип')
                    ->badge()
                    ->formatStateUsing(fn(string $state): string => match ($state) {
                        'law' => 'Закон',
                        'decree' => 'Указ Президента',
                        'resolution_president' => 'Постановление Президента',
                        'resolution_cabinet' => 'Постановление КМ',
                        'justice_ministry' => 'Минюст РУз',
                        default => 'Прочее',
                    })
                    ->color(fn(string $state): string => match ($state) {
                        'law' => 'success',
                        'decree' => 'warning',
                        'resolution_president' => 'info',
                        'resolution_cabinet' => 'danger',
                        'justice_ministry' => 'primary',
                        default => 'gray',
                    }),

                TextColumn::make('title')
                    ->label('Название')
                    ->searchable()
                    ->getStateUsing(fn($record) => $record->getTranslation('title', 'ru')),

                TextColumn::make('document_number')
                    ->label('Номер')
                    ->searchable(),

                TextColumn::make('adopted_at')
                    ->label('Дата')
                    ->date('d.m.Y')
                    ->sortable(),

                IconColumn::make('is_active')
                    ->label('Активен')
                    ->boolean(),

                TextColumn::make('sort_order')
                    ->label('Сорт.')
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('type')
                    ->options([
                        'law' => 'Законы',
                        'decree' => 'Указы Президента',
                        'resolution_president' => 'Постановления Президента',
                        'resolution_cabinet' => 'Постановления КМ',
                        'justice_ministry' => 'Минюст',
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
            ->defaultSort('sort_order');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListLegalDocuments::route('/'),
            'create' => Pages\CreateLegalDocument::route('/create'),
            'edit' => Pages\EditLegalDocument::route('/{record}/edit'),
        ];
    }
}

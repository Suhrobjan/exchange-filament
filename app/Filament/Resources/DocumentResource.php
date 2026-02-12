<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DocumentResource\Pages;
use App\Models\Document;
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
use Filament\Tables\Table;

class DocumentResource extends Resource
{
    protected static ?string $model = Document::class;

    public static function getNavigationIcon(): ?string
    {
        return 'heroicon-o-document-arrow-down';
    }

    public static function getNavigationSort(): ?int
    {
        return 3;
    }

    public static function getNavigationLabel(): string
    {
        return 'Документы';
    }

    public static function getModelLabel(): string
    {
        return 'Документ';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Документы';
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
                                    ->required()
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(fn($set, ?string $state) => $set('slug', Str::slug($state))),
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

                Layout\Section::make('Файл и настройки')
                    ->schema([
                        Components\TextInput::make('slug')
                            ->label('URL (slug)')
                            ->required()
                            ->unique(ignoreRecord: true),

                        Components\Select::make('category')
                            ->label('Категория')
                            ->options([
                                'annual_report' => 'Годовой отчет',
                                'quarterly_report' => 'Квартальный отчет',
                                'material_fact' => 'Существенный факт',
                                'license' => 'Лицензия',
                                'financial_statement' => 'Финансовая отчетность',
                                'regulatory' => 'Нормативный документ',
                                'charter' => 'Устав',
                                'audit_report' => 'Аудиторское заключение',
                                'other' => 'Прочее',
                            ])
                            ->required(),

                        Components\FileUpload::make('file_path')
                            ->label('Файл')
                            ->directory('documents')
                            ->acceptedFileTypes(['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document']),

                        Components\Toggle::make('is_published')
                            ->label('Опубликован')
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
                TextColumn::make('title')
                    ->label('Название')
                    ->searchable()
                    ->getStateUsing(fn($record) => $record->getTranslation('title', 'ru')),

                TextColumn::make('category')
                    ->label('Категория')
                    ->badge()
                    ->formatStateUsing(fn(string $state): string => match ($state) {
                        'annual_report' => 'Годовой отчет',
                        'quarterly_report' => 'Квартальный отчет',
                        'material_fact' => 'Существенный факт',
                        'license' => 'Лицензия',
                        'financial_statement' => 'Фин. отчетность',
                        'regulatory' => 'Нормативный',
                        'charter' => 'Устав',
                        'audit_report' => 'Аудит',
                        default => $state,
                    }),

                TextColumn::make('updated_at')
                    ->label('Обновлено')
                    ->dateTime('d.m.Y')
                    ->sortable(),

                IconColumn::make('is_published')
                    ->label('Опубликован')
                    ->boolean(),

                TextColumn::make('sort_order')
                    ->label('Сорт.')
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('category')
                    ->options([
                        'annual_report' => 'Годовой отчет',
                        'quarterly_report' => 'Квартальный отчет',
                        'material_fact' => 'Существенный факт',
                        'license' => 'Лицензия',
                        'financial_statement' => 'Фин. отчетность',
                        'regulatory' => 'Нормативный',
                        'charter' => 'Устав',
                        'audit_report' => 'Аудит',
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
            'index' => Pages\ListDocuments::route('/'),
            'create' => Pages\CreateDocument::route('/create'),
            'edit' => Pages\EditDocument::route('/{record}/edit'),
        ];
    }
}

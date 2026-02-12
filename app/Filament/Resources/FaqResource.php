<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FaqResource\Pages;
use App\Models\Faq;
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

class FaqResource extends Resource
{
    protected static ?string $model = Faq::class;

    public static function getNavigationIcon(): ?string
    {
        return 'heroicon-o-question-mark-circle';
    }

    public static function getNavigationSort(): ?int
    {
        return 5;
    }

    public static function getNavigationLabel(): string
    {
        return 'FAQ';
    }

    public static function getModelLabel(): string
    {
        return 'Вопрос';
    }

    public static function getPluralModelLabel(): string
    {
        return 'FAQ';
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
                                Components\TextInput::make('question.uz')
                                    ->label('Вопрос (UZ)')
                                    ->required(),
                                Components\RichEditor::make('answer.uz')
                                    ->label('Ответ (UZ)')
                                    ->required(),
                            ]),
                        Layout\Tabs\Tab::make('Русский')
                            ->schema([
                                Components\TextInput::make('question.ru')
                                    ->label('Вопрос (RU)')
                                    ->required(),
                                Components\RichEditor::make('answer.ru')
                                    ->label('Ответ (RU)')
                                    ->required(),
                            ]),
                        Layout\Tabs\Tab::make('English')
                            ->schema([
                                Components\TextInput::make('question.en')
                                    ->label('Question (EN)'),
                                Components\RichEditor::make('answer.en')
                                    ->label('Answer (EN)'),
                            ]),
                    ])
                    ->columnSpanFull(),

                Layout\Section::make('Настройки')
                    ->schema([
                        Components\Select::make('category')
                            ->label('Категория')
                            ->options([
                                'general' => 'Общие вопросы',
                                'trading' => 'Торговля',
                                'accreditation' => 'Аккредитация',
                                'technical' => 'Технические вопросы',
                            ])
                            ->default('general'),

                        Components\Toggle::make('is_published')
                            ->label('Опубликован')
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
                TextColumn::make('question')
                    ->label('Вопрос')
                    ->searchable()
                    ->limit(50)
                    ->getStateUsing(fn($record) => $record->getTranslation('question', 'ru')),

                TextColumn::make('category')
                    ->label('Категория')
                    ->badge(),

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
                        'general' => 'Общие',
                        'trading' => 'Торговля',
                        'accreditation' => 'Аккредитация',
                        'technical' => 'Технические',
                    ]),
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->defaultSort('sort_order');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListFaqs::route('/'),
            'create' => Pages\CreateFaq::route('/create'),
            'edit' => Pages\EditFaq::route('/{record}/edit'),
        ];
    }
}

<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AnnouncementResource\Pages;
use App\Models\Announcement;
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

class AnnouncementResource extends Resource
{
    protected static ?string $model = Announcement::class;

    public static function getNavigationIcon(): ?string
    {
        return 'heroicon-o-megaphone';
    }

    public static function getNavigationSort(): ?int
    {
        return 4;
    }

    public static function getNavigationLabel(): string
    {
        return 'Объявления';
    }

    public static function getModelLabel(): string
    {
        return 'Объявление';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Объявления';
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
                        Layout\Tabs\Tab::make('Русский')
                            ->schema([
                                Components\TextInput::make('title.ru')
                                    ->label('Заголовок (RU)')
                                    ->required()
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(fn($set, ?string $state) => $set('slug', Str::slug($state))),
                                Components\RichEditor::make('content.ru')
                                    ->label('Содержание (RU)')
                                    ->required(),
                            ]),
                        Layout\Tabs\Tab::make('O\'zbekcha')
                            ->schema([
                                Components\TextInput::make('title.uz')
                                    ->label('Sarlavha (UZ)'),
                                Components\RichEditor::make('content.uz')
                                    ->label('Mazmuni (UZ)'),
                            ]),
                        Layout\Tabs\Tab::make('English')
                            ->schema([
                                Components\TextInput::make('title.en')
                                    ->label('Title (EN)'),
                                Components\RichEditor::make('content.en')
                                    ->label('Content (EN)'),
                            ]),
                    ])
                    ->columnSpanFull(),

                Layout\Section::make('Настройки')
                    ->schema([
                        Components\TextInput::make('slug')
                            ->label('URL (slug)')
                            ->required()
                            ->unique(ignoreRecord: true),

                        Components\Select::make('type')
                            ->label('Тип')
                            ->options([
                                'info' => 'Информация',
                                'warning' => 'Предупреждение',
                                'urgent' => 'Срочно',
                                'support' => 'Поддержка',
                            ])
                            ->default('info'),

                        Components\DateTimePicker::make('published_at')
                            ->label('Дата публикации')
                            ->default(now()),

                        Components\DateTimePicker::make('expires_at')
                            ->label('Срок действия'),

                        Components\Toggle::make('is_published')
                            ->label('Опубликовано')
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
                    ->label('Заголовок')
                    ->searchable()
                    ->getStateUsing(fn($record) => $record->getTranslation('title', 'ru')),

                TextColumn::make('type')
                    ->label('Тип')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'info' => 'info',
                        'warning' => 'warning',
                        'urgent' => 'danger',
                        default => 'gray',
                    }),

                TextColumn::make('published_at')
                    ->label('Опубликовано')
                    ->dateTime('d.m.Y H:i')
                    ->sortable(),

                TextColumn::make('expires_at')
                    ->label('Истекает')
                    ->dateTime('d.m.Y')
                    ->sortable(),

                IconColumn::make('is_published')
                    ->label('Активно')
                    ->boolean(),
            ])
            ->filters([
                SelectFilter::make('type')
                    ->options([
                        'info' => 'Информация',
                        'warning' => 'Предупреждение',
                        'urgent' => 'Срочно',
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
            ->defaultSort('published_at', 'desc');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAnnouncements::route('/'),
            'create' => Pages\CreateAnnouncement::route('/create'),
            'edit' => Pages\EditAnnouncement::route('/{record}/edit'),
        ];
    }
}

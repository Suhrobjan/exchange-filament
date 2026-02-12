<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StaffResource\Pages;
use App\Models\Staff;
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
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\ImageColumn;

class StaffResource extends Resource
{
    protected static ?string $model = Staff::class;

    public static function getNavigationIcon(): ?string
    {
        return 'heroicon-o-users';
    }

    public static function getNavigationGroup(): ?string
    {
        return 'О Бирже';
    }

    public static function getModelLabel(): string
    {
        return 'Сотрудник';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Руководство';
    }

    public static function form(Schema $form): Schema
    {
        return $form
            ->components([
                Layout\Section::make('Основная информация')
                    ->schema([
                        Layout\Tabs::make('Локализация')
                            ->tabs([
                                Layout\Tabs\Tab::make('Русский')
                                    ->schema([
                                        Components\TextInput::make('name.ru')
                                            ->label('ФИО (RU)')
                                            ->required(),
                                        Components\TextInput::make('position.ru')
                                            ->label('Должность (RU)')
                                            ->required(),
                                        Components\RichEditor::make('bio.ru')
                                            ->label('Биография (RU)'),
                                    ]),
                                Layout\Tabs\Tab::make('O\'zbekcha')
                                    ->schema([
                                        Components\TextInput::make('name.uz')
                                            ->label('F.I.SH. (UZ)')
                                            ->required(),
                                        Components\TextInput::make('position.uz')
                                            ->label('Lavozimi (UZ)')
                                            ->required(),
                                        Components\RichEditor::make('bio.uz')
                                            ->label('Biografiya (UZ)'),
                                    ]),
                                Layout\Tabs\Tab::make('English')
                                    ->schema([
                                        Components\TextInput::make('name.en')
                                            ->label('Full Name (EN)'),
                                        Components\TextInput::make('position.en')
                                            ->label('Position (EN)'),
                                        Components\RichEditor::make('bio.en')
                                            ->label('Biography (EN)'),
                                    ]),
                            ])->columnSpanFull(),
                    ]),

                Layout\Section::make('Медиа и Настройки')
                    ->schema([
                        FileUpload::make('photo')
                            ->label('Фотография')
                            ->image()
                            ->directory('staff-photos')
                            ->avatar()
                            ->imageEditor(),

                        Components\Select::make('type')
                            ->label('Тип руководства')
                            ->options([
                                'supervisory_board' => 'Наблюдательный совет',
                                'board_of_directors' => 'Правление',
                            ])
                            ->required(),

                        Components\TextInput::make('sort_order')
                            ->label('Порядок сортировки')
                            ->numeric()
                            ->default(0),

                        Components\Toggle::make('is_active')
                            ->label('Активно')
                            ->default(true),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('photo')
                    ->label('Фото')
                    ->circular(),

                Columns\TextColumn::make('name')
                    ->label('ФИО')
                    ->searchable()
                    ->getStateUsing(fn($record) => $record->getTranslation('name', 'ru')),

                Columns\TextColumn::make('position')
                    ->label('Должность')
                    ->limit(50)
                    ->getStateUsing(fn($record) => $record->getTranslation('position', 'ru')),

                Columns\TextColumn::make('type')
                    ->label('Тип')
                    ->badge()
                    ->colors([
                        'primary' => 'supervisory_board',
                        'success' => 'board_of_directors',
                    ])
                    ->formatStateUsing(fn(string $state): string => match ($state) {
                        'supervisory_board' => 'Наб. совет',
                        'board_of_directors' => 'Правление',
                    }),

                Columns\ToggleColumn::make('is_active')
                    ->label('Активно'),

                Columns\TextColumn::make('sort_order')
                    ->label('Сорт.')
                    ->sortable(),
            ])
            ->defaultSort('sort_order', 'asc')
            ->filters([
                \Filament\Tables\Filters\SelectFilter::make('type')
                    ->label('Тип')
                    ->options([
                        'supervisory_board' => 'Наблюдательный совет',
                        'board_of_directors' => 'Правление',
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
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListStaff::route('/'),
            'create' => Pages\CreateStaff::route('/create'),
            'edit' => Pages\EditStaff::route('/{record}/edit'),
        ];
    }
}

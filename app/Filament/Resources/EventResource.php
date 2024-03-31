<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EventResource\Pages;
use App\Filament\Resources\EventResource\RelationManagers;
use App\Models\Event;
use App\Models\Sponsor;
use Filament\Forms;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EventResource extends Resource
{
    protected static ?string $model = Event::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make([
                    Section::make('Basic Details')
                        ->schema([
                            Forms\Components\TextInput::make('name')
                                ->required()
                                ->maxLength(125),
                            Forms\Components\Select::make('event_type')
                                ->options([
                                    'online' => 'Online',
                                    'offline' => 'Offline',
                                    'both' => 'Online + Offline'
                                ])
                                ->required(),
                            Forms\Components\Textarea::make('description')
                                ->autosize()
                                ->columnSpanFull(),
                            Forms\Components\TextInput::make('venue')
                            ->prefixIcon('heroicon-m-map-pin')
                                ->required(),
                            Group::make([
                                Forms\Components\FileUpload::make('event_logo_path')
                                    ->label('Logo')
                                    ->image()
                                    ->directory('event.logos'),
                                Forms\Components\FileUpload::make('event_banner_path')
                                    ->label('Banner')
                                    ->image()
                                    ->directory('event.banners'),
                            ])->columns(2)
                        ])->columnSpan(2),
                    Group::make([
                        Section::make('Event Dates')->schema([
                            Forms\Components\DatePicker::make('start_date')
                                ->required(),
                            Forms\Components\DatePicker::make('end_date'),
                        ]),
                        Section::make('Registration')->schema([
                            Forms\Components\DatePicker::make('registration_start_date')
                                ->label('Start Date')
                                ->required(),
                            Forms\Components\DatePicker::make('registration_end_date')
                                ->label('End Date')
                                ->required(),
                        ]),
                    ])->columnSpan(1),
                        Repeater::make('sponsors')
                        ->relationship()
                        ->schema([
                            Select::make('sponsor_id')
                            ->options(Sponsor::all()->pluck('name', 'id'))
                        ])
                ])->columns(3),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('start_date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('end_date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('registration_start_date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('registration_end_date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('event_type')
                    ->searchable(),
                Tables\Columns\TextColumn::make('event_logo_path')
                    ->searchable(),
                Tables\Columns\TextColumn::make('event_banner_path')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEvents::route('/'),
            'create' => Pages\CreateEvent::route('/create'),
            'edit' => Pages\EditEvent::route('/{record}/edit'),
        ];
    }
}

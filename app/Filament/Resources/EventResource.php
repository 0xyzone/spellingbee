<?php

namespace App\Filament\Resources;

use Carbon\Carbon;
use Filament\Forms;
use Filament\Tables;
use App\Models\Event;
use App\Models\Sponsor;
use Filament\Forms\Get;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Repeater;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\EventResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\EventResource\RelationManagers;

class EventResource extends Resource
{
    protected static ?string $model = Event::class;

    protected static ?string $navigationIcon = 'heroicon-o-trophy';
    protected static ?string $activeNavigationIcon = 'heroicon-c-trophy';

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
                                ->searchable()
                                ->required()
                                ->reactive(),
                            Forms\Components\Textarea::make('description')
                                ->autosize()
                                ->columnSpanFull(),
                            Forms\Components\TextInput::make('venue')
                                ->prefixIcon('heroicon-m-map-pin')
                                ->required()
                                ->hidden(fn(Get $get): bool => !$get('event_type') ? true : ($get('event_type') == 'online' ? true : false)),
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
                        Section::make('Registration')->schema([
                            Forms\Components\DateTimePicker::make('registration_start_date')
                                ->native(false)
                                ->label('Start Date')
                                // ->minDate(today())
                                ->seconds(false)
                                ->minutesStep(15)
                                ->weekStartsOnSunday()
                                ->reactive()
                                ->required(),
                            Forms\Components\DateTimePicker::make('registration_end_date')
                                ->native(false)
                                ->label('End Date')
                                ->minDate(function (Get $get) {
                                    return Carbon::createFromDate($get('registration_start_date'))->addDays(1);
                                })
                                ->reactive()
                                ->seconds(false)
                                ->minutesStep(15)
                                ->weekStartsOnSunday()
                                ->required()
                                ->hidden(fn(Get $get): bool => !$get('registration_start_date') ? true : false),
                        ]),
                        Section::make('Event Dates')->schema([
                            Forms\Components\DatePicker::make('start_date')
                                ->native(false)
                                ->minDate(function (Get $get) {
                                    return Carbon::createFromDate($get('registration_end_date'))->addDays(1);
                                })
                                ->weekStartsOnSunday()
                                ->closeOnDateSelection()
                                ->required()
                                ->reactive(),
                            Forms\Components\DatePicker::make('end_date')
                                ->native(false)
                                ->weekStartsOnSunday()
                                ->closeOnDateSelection()
                                ->minDate(function (Get $get) {
                                    return Carbon::createFromDate($get('start_date'))->addDays(1);
                                })
                                ->label('End date (optional)')
                                ->hidden(fn(Get $get): bool => !$get('start_date') ? true : false),
                        ])->hidden(fn(Get $get): bool => !$get('registration_end_date') ? true : false),
                    ])->columnSpan(1),
                    Repeater::make('sponsors')
                        ->addActionLabel('+ Add more')
                        ->collapsible()
                        ->relationship()
                        ->simple(
                            Select::make('sponsor_id')
                                ->searchable()
                                ->distinct()
                                ->label('')
                                ->options(Sponsor::all()->pluck('name', 'id'))
                        )->columnSpan(2)
                ])->columns(3),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('registration_start_date')
                    ->label('Reg Starts')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('registration_end_date')
                    ->label('Reg Ends')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('start_date')
                    ->label('Starts From')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('end_date')
                    ->label('Ends On')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('event_type')
                    ->badge(),
                Tables\Columns\ImageColumn::make('event_logo_path')
                    ->label('Logo')
                    ->simpleLightbox()
                    ->extraImgAttributes([
                        'class' => '!object-fit'
                    ]),
                Tables\Columns\ImageColumn::make('event_banner_path')
                    ->simpleLightbox()
                    ->label('Banner'),
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

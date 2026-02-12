<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SupporterResource\Pages;
use App\Filament\Resources\SupporterResource\RelationManagers;
use App\Models\Supporter;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Support\Enums\IconPosition;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SupporterResource extends Resource
{
    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
    protected static ?string $model = Supporter::class;

    protected static ?string $navigationIcon = 'heroicon-o-hand-raised';
    protected static ?string $activeNavigationIcon = 'heroicon-m-hand-raised';
    protected static ?int $navigationSort = 2;
    protected static ?string $navigationGroup = 'Helping Hands';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Sponsor Details')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->prefixIcon('heroicon-m-briefcase')
                            ->required()
                            ->maxLength(125),
                        Forms\Components\Textarea::make('description')
                            ->required()
                            ->autosize()
                            ->columnSpanFull(),
                        Forms\Components\TextInput::make('url')
                            ->label('Website')
                            ->prefix('https://')
                            ->prefixIcon('heroicon-o-globe-asia-australia')
                            ->maxLength(125),
                        Forms\Components\FileUpload::make('supporter_logo_path')
                            ->label('Logo')
                            ->required()
                            ->image(),
                        Forms\Components\FileUpload::make('supporter_banner_path')
                            ->label('Banner')
                            ->image(),
                    ])->columnSpan(3),
                Section::make('Contact Details')
                    ->schema([
                        Forms\Components\TextInput::make('contact_person_name')
                            ->prefixIcon('heroicon-m-user')
                            ->required()
                            ->maxLength(125),
                        Forms\Components\TextInput::make('contact_person_phone')
                            ->prefixIcon('heroicon-m-phone')
                            ->tel()
                            ->required()
                            ->maxLength(125),
                        Forms\Components\TextInput::make('contact_person_email')
                            ->prefixIcon('heroicon-m-at-symbol')
                            ->email()
                            ->maxLength(125),
                    ])
                    ->columnSpan(2)
            ])->columns(5);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('contact_person_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('contact_person_email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('contact_person_phone')
                    ->searchable(),
                Tables\Columns\TextColumn::make('url')
                ->label('Website')
                ->default('-')
                ->url(fn ($state) => $state == '-' ? null : 'https://' . $state)
                ->icon(fn ($state)  => $state == '-' ? '' : 'heroicon-c-arrow-top-right-on-square')
                ->iconColor('primary')
                ->iconPosition(IconPosition::After),
                Tables\Columns\ImageColumn::make('supporter_logo_path')
                ->label('Logo')
                    ->simpleLightbox()
                    ->width(150)
                ->extraImgAttributes([
                    'class' => '!object-scale-down'
                ]),
                Tables\Columns\ImageColumn::make('supporter_banner_path')
                ->label('Banner')
                ->simpleLightbox()
                    ->toggleable(isToggledHiddenByDefault: true)
                ->size(80),
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
            'index' => Pages\ListSupporters::route('/'),
            // 'create' => Pages\CreateSupporter::route('/create'),
            // 'edit' => Pages\EditSupporter::route('/{record}/edit'),
        ];
    }
}

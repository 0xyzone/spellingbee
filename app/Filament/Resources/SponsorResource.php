<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SponsorResource\Pages;
use App\Filament\Resources\SponsorResource\RelationManagers;
use App\Models\Sponsor;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SponsorResource extends Resource
{
    protected static ?string $model = Sponsor::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

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
                            ->prefixIcon('heroicon-o-globe-asia-australia')
                            ->url()
                            ->maxLength(125),
                        Forms\Components\FileUpload::make('sponsor_logo_path')
                            ->label('Logo')
                            ->required()
                            ->image(),
                        Forms\Components\FileUpload::make('sponsor_banner_path')
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
                    ->searchable(),
                Tables\Columns\TextColumn::make('sponsor_logo_path')
                    ->searchable(),
                Tables\Columns\TextColumn::make('sponsor_banner_path')
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
            'index' => Pages\ListSponsors::route('/'),
            'create' => Pages\CreateSponsor::route('/create'),
            'edit' => Pages\EditSponsor::route('/{record}/edit'),
        ];
    }
}

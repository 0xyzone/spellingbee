<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\TestSample;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Section;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\TestSampleResource\Pages;
use App\Filament\Resources\TestSampleResource\RelationManagers;

class TestSampleResource extends Resource
{
    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
    protected static ?int $navigationSort = 6;
    protected static ?string $model = TestSample::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $activeNavigationIcon = 'heroicon-m-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make([
                    Forms\Components\TextInput::make('title')
                        ->required()
                        ->maxLength(125),
                    Forms\Components\Textarea::make('description')
                        ->columnSpanFull()
                        ->autosize(),
                ])->columnSpan(1),
                Section::make([
                    Forms\Components\FileUpload::make('file')
                        ->required()
                        ->moveFile()
                        ->disk('public')
                        ->directory('test_samples')
                        ->visibility('public')
                        ->openable()
                        ->downloadable()
                        ->acceptedFileTypes(['application/pdf']),
                ])->columnSpan(1)
            ])
            ->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\IconColumn::make('file')
                    ->icon('heroicon-c-document-arrow-down')
                    ->color('primary')
                    ->url(fn (Model $record) => asset('storage/'. $record->file), shouldOpenInNewTab: true),
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
            'index' => Pages\ListTestSamples::route('/'),
            'create' => Pages\CreateTestSample::route('/create'),
            'edit' => Pages\EditTestSample::route('/{record}/edit'),
        ];
    }
}

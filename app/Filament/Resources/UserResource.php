<?php

namespace App\Filament\Resources;

use Carbon\Carbon;
use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Model;
use pxlrbt\FilamentExcel\Columns\Column;
use Illuminate\Database\Eloquent\Builder;
use pxlrbt\FilamentExcel\Exports\ExcelExport;
use App\Filament\Resources\UserResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use pxlrbt\FilamentExcel\Actions\Tables\ExportAction;
use App\Filament\Resources\UserResource\RelationManagers;

class UserResource extends Resource
{
    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::where('id', '!=', 1)->count();
    }
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';
    protected static ?string $activeNavigationIcon = 'heroicon-c-users';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(125),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    ->disabledOn('edit')
                    ->maxLength(125),
                Forms\Components\TextInput::make('username')
                    ->disabled(fn($state): bool => $state != null ? true : false)
                    ->required()
                    ->maxLength(125),
                Forms\Components\DatePicker::make('date_of_birth')
                    ->required(),
                Forms\Components\TextInput::make('contact_number')
                    ->required()
                    ->tel(),
                Forms\Components\Textarea::make('address')
                    ->autosize()
                    ->columnSpanFull(),
                Forms\Components\Select::make('roles')
                    ->relationship('roles', 'name')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('roles.name'),
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                // Tables\Columns\TextColumn::make('username')
                //     ->searchable(),
                Tables\Columns\TextColumn::make('date_of_birth')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('contact_number')
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('id', 'desc')
            ->filters([
                //
            ])
            ->headerActions([
                ExportAction::make()->exports([
                    ExcelExport::make()
                    ->withWriterType(\Maatwebsite\Excel\Excel::CSV)
                    ->withColumns([
                        Column::make('id'),
                        Column::make('name'),
                        Column::make('email'),
                        Column::make('date_of_birth'),
                        Column::make('contact_number'),
                        Column::make('address'),
                        Column::make('school'),
                        Column::make('school_email'),
                        Column::make('school_address'),
                        Column::make('school_number'),
                        Column::make('grade'),
                        Column::make('representative_name'),
                        Column::make('representative_relationship'),
                        Column::make('representative_number'),
                    ])
                ])
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListUsers::route('/'),
            // 'create' => Pages\CreateUser::route('/create'),
            // 'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
    public static function canCreate(): bool
    {
        return false;
    }
}

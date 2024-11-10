<?php

namespace App\Filament\Resources;

use Filament\Tables;
use App\Models\Event;
use Filament\Tables\Table;
use App\Models\Registration;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use pxlrbt\FilamentExcel\Columns\Column;
use Filament\Tables\Filters\SelectFilter;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\Livewire;
use Filament\Infolists\Components\TextEntry;
use pxlrbt\FilamentExcel\Exports\ExcelExport;
use App\Filament\Exports\RegistrationExporter;
use Filament\Infolists\Components\Actions\Action;
use pxlrbt\FilamentExcel\Actions\Tables\ExportAction;
use App\Filament\Resources\RegistrationResource\Pages;

class RegistrationResource extends Resource
{
    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
    protected static ?int $navigationSort = 4;
    protected static ?string $model = Registration::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-check';
    protected static ?string $activeNavigationIcon = 'heroicon-c-clipboard-document-check';

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Section::make('Registration Details')
                    ->description(fn($record) => 'Status: ' . ucfirst($record->status))
                    ->headerActions([
                        Action::make('Call Representative')
                            ->url(fn(Registration $record) => 'tel:' . $record->user->representative_number)
                            ->color('info')
                            ->icon('heroicon-c-phone-arrow-up-right'),
                        Action::make('Call')
                            ->url(fn(Registration $record) => 'tel:' . $record->user->contact_number)
                            ->color('info')
                            ->icon('heroicon-c-phone-arrow-up-right'),
                        Action::make('Approve')
                            ->action(function (Registration $record) {
                                $record->status = 'approved';
                                $record->save();
                            })
                            ->color('success'),
                        Action::make('Decline')
                            ->action(function (Registration $record) {
                                $record->status = 'declined';
                                $record->save();
                            })
                            ->color('danger'),
                    ])
                    ->schema([
                        Livewire::make('')
                            ->view('infolists.components.registration')
                            ->columns(2)
                            ->columnSpan(2)
                            ->lazy(),
                    ]),
            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('id','desc')
            ->columns([
                Tables\Columns\TextColumn::make('id')
                ->label('Registration Id')
                ->alignRight()
                ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('event.name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\ImageColumn::make('user.avatar.user_avatar_path')
                    ->simpleLightbox(),
                Tables\Columns\SelectColumn::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'declined' => 'Declined',
                        'approved' => 'Approved',
                    ])
                    ->disablePlaceholderSelection()
                    ->extraAttributes(['class' => 'min-w-max']),
                Tables\Columns\TextColumn::make('user.id')
                    ->label('#')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Contestnt')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\ViewColumn::make('age')
                    ->view('tables.columns.user-age')
                    ->label('Age'),
                Tables\Columns\TextColumn::make('user.address')
                    ->label('Address'),
                Tables\Columns\TextColumn::make('user.contact_number')
                    ->label('Phone')
                    ->searchable(),
                Tables\Columns\TextColumn::make('user.email')
                    ->label('Email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('user.school')
                    ->label('School'),
                Tables\Columns\TextColumn::make('user.school_address')
                    ->label('School Address'),
                Tables\Columns\TextColumn::make('user.school_number')
                    ->label('School Number'),
                Tables\Columns\TextColumn::make('user.school_email')
                    ->label('School Email'),
                Tables\Columns\TextColumn::make('user.representative_name')
                    ->label('Representative Name'),
                Tables\Columns\TextColumn::make('user.representative_number')
                    ->label('Representative Number'),
                Tables\Columns\TextColumn::make('user.representative_relationship')
                    ->label('Representative Relationship'),
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
                SelectFilter::make('event_id')
                    ->label('Event')
                    ->options(fn(): array => Event::query()->pluck('name', 'id')->all())
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
            ])
            ->headerActions([
                // ExportAction::make()
                // ->exporter(RegistrationExporter::class)
                ExportAction::make()->exports([
                    ExcelExport::make('table')->fromTable()->only([
                        'user.id',
                        'user.name',
                        'user.school',
                        'user.age',
                        'user.contact_number',
                        'user.address',
                        'user.representative_name',
                        'user.representative_number',
                        'user.representative_relationship'
                    ])->withColumns([
                                Column::make('age')
                                    ->formatStateUsing(fn($record) => $record->user->age())
                            ])
                        ->askForFilename()
                        ->askForWriterType(),
                ])
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

    public static function canCreate(): bool
    {
        return false;
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRegistrations::route('/'),
            // 'view' => Pages\ViewRegistration::route('/{record}'),
        ];
    }
}

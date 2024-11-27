<?php

namespace App\Filament\Exports;

use App\Models\Registration;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;

class RegistrationExporter extends Exporter
{
    protected static ?string $model = Registration::class;

    public static function getColumns(): array
    {
        return [
            ExportColumn::make('id')
                ->label('ID'),
            ExportColumn::make('user.name')
            ->label('Name'),
            ExportColumn::make('user.gender')
            ->label('Gender'),
            ExportColumn::make('user.email')
            ->label('Email'),
            ExportColumn::make('user.username')
            ->label('Username'),
            ExportColumn::make('user.date_of_birth')
            ->label('Date of Birth'),
            ExportColumn::make('user.contact_number')
            ->label('Contact Number'),
            ExportColumn::make('user.address')
            ->label('Address'),
            ExportColumn::make('user.school')
            ->label('School'),
            ExportColumn::make('user.grade')
            ->label('Grade'),
            ExportColumn::make('user.representative_name')
            ->label('Representative Name'),
            ExportColumn::make('user.representative_number')
            ->label('Representative Number'),
            ExportColumn::make('user.representative_relationship')
            ->label('Representative Relationship'),
            ExportColumn::make('event.name')
            ->label('Event Name'),
            ExportColumn::make('status'),
            ExportColumn::make('created_at')
            ->label('Registered On'),
        ];
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'Your registration export has completed and ' . number_format($export->successful_rows) . ' ' . str('row')->plural($export->successful_rows) . ' exported.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to export.';
        }

        return $body;
    }
}

<?php

namespace App\Filament\Resources\RegistrationResource\Pages;

use Filament\Actions;
use App\Models\Registration;
use Filament\Resources\Pages\ViewRecord;
use App\Filament\Resources\RegistrationResource;

class ViewRegistration extends ViewRecord
{
    protected static string $resource = RegistrationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('Approve')
                ->action(function (Registration $record) {
                    $record->status = 'approved';
                    $record->save();
                })
                ->requiresConfirmation()
                ->color('success'),
            Actions\Action::make('Decline')
                ->action(function (Registration $record) {
                    $record->status = 'declined';
                    $record->save();
                })
                ->requiresConfirmation()
                ->color('danger')
        ];
    }
}

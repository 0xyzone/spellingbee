<?php

namespace App\Filament\Resources\EventSponsorResource\Pages;

use App\Filament\Resources\EventSponsorResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEventSponsor extends EditRecord
{
    protected static string $resource = EventSponsorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

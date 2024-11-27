<?php

namespace App\Filament\Resources\EventSponsorResource\Pages;

use App\Filament\Resources\EventSponsorResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListEventSponsors extends ListRecords
{
    protected static string $resource = EventSponsorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

<?php

namespace App\Filament\Resources\ReistrationResource\Pages;

use App\Filament\Resources\ReistrationResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewReistration extends ViewRecord
{
    protected static string $resource = ReistrationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}

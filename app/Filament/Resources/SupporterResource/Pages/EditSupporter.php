<?php

namespace App\Filament\Resources\SupporterResource\Pages;

use App\Filament\Resources\SupporterResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSupporter extends EditRecord
{
    protected static string $resource = SupporterResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

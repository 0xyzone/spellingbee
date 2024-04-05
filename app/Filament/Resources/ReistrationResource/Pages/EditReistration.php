<?php

namespace App\Filament\Resources\ReistrationResource\Pages;

use App\Filament\Resources\ReistrationResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditReistration extends EditRecord
{
    protected static string $resource = ReistrationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}

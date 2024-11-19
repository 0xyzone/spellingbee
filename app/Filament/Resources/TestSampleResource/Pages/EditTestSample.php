<?php

namespace App\Filament\Resources\TestSampleResource\Pages;

use App\Filament\Resources\TestSampleResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTestSample extends EditRecord
{
    protected static string $resource = TestSampleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}

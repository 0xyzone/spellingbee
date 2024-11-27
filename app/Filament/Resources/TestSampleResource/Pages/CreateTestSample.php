<?php

namespace App\Filament\Resources\TestSampleResource\Pages;

use App\Filament\Resources\TestSampleResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateTestSample extends CreateRecord
{
    protected static string $resource = TestSampleResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}

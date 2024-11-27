<?php

namespace App\Filament\Resources\TestSampleResource\Pages;

use App\Filament\Resources\TestSampleResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTestSamples extends ListRecords
{
    protected static string $resource = TestSampleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

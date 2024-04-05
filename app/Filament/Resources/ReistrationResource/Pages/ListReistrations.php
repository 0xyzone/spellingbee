<?php

namespace App\Filament\Resources\ReistrationResource\Pages;

use App\Filament\Resources\ReistrationResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListReistrations extends ListRecords
{
    protected static string $resource = ReistrationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

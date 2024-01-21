<?php

namespace App\Filament\Resources\BuildingsResource\Pages;

use App\Filament\Resources\BuildingsResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBuildings extends EditRecord
{
    protected static string $resource = BuildingsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

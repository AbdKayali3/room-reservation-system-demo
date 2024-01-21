<?php

namespace App\Filament\Resources\SeasonsResource\Pages;

use App\Filament\Resources\SeasonsResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSeasons extends EditRecord
{
    protected static string $resource = SeasonsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

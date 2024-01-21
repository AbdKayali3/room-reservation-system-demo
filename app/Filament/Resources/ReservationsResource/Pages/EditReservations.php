<?php

namespace App\Filament\Resources\ReservationsResource\Pages;

use App\Filament\Resources\ReservationsResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditReservations extends EditRecord
{
    protected static string $resource = ReservationsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

<?php

namespace App\Filament\Resources\BoardPrivateResource\Pages;

use App\Filament\Resources\BoardPrivateResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageBoardPrivates extends ManageRecords
{
    protected static string $resource = BoardPrivateResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

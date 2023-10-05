<?php

namespace App\Filament\Resources\TenantResource\Pages;

use App\Filament\Resources\TenantResource;
use App\Models\Tenant;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Resources\Pages\EditRecord;

class EditTenant extends EditRecord
{
    protected static string $resource = TenantResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('view stats')
                ->url(fn (Tenant $record): string => route('stats.tenant', ['tenant' => $record->getKey()]))
                ->openUrlInNewTab(),
            Actions\DeleteAction::make(),
        ];
    }
}

<?php

namespace Obelaw\ERP\Addons\Catalog\Filament\Resources\ProductResource;

use Filament\Resources\Pages\CreateRecord;
use Obelaw\ERP\Addons\Catalog\Filament\Resources\ProductResource;

class CreateProduct extends CreateRecord
{
    protected static string $resource = ProductResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // dd($data);
        return $data;
    }
}

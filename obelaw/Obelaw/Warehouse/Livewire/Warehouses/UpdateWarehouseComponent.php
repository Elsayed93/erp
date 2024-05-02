<?php

namespace Obelaw\Warehouse\Livewire\Warehouses;

use Obelaw\Permissions\Attributes\Access;
use Obelaw\UI\Renderer\FormRender;
use Obelaw\Warehouse\Models\Place\Warehouse;

#[Access('warehouse_warehouses_update')]
class UpdateWarehouseComponent extends FormRender
{
    public $formId = 'obelaw_warehouse_warehouses_form';

    public $warehouse = null;

    protected $pretitle = 'Warehouses';
    protected $title = 'Update the warehouse';

    public function mount(Warehouse $warehouse)
    {
        $this->warehouse = $warehouse;

        $this->setInputs([
            'name' => $warehouse->name,
            'code' => $warehouse->code,
            'description' => $warehouse->description,
            'address' => $warehouse->address,
        ]);
    }

    public function submit()
    {
        $validateData = $this->getInputs();

        $this->warehouse->update($validateData);
    }
}

<?php

namespace Obelaw\Purchasing\Livewire\PurchaseOrders;

use Obelaw\Purchasing\Support\Facades\Orders;
use Obelaw\Permissions\Attributes\Access;
use Obelaw\UI\Renderer\FormRender;

#[Access('purchasing_po_create')]
class CreateDraftPOComponent extends FormRender
{
    public $formId = 'obelaw_purchasing_draft_po_form';

    public function submit()
    {
        $validateData = $this->getInputs();

        $order = Orders::createDraft($validateData['vendor_id']);

        $this->pushAlert('success', 'The catagory has been created');

        return redirect()->route('obelaw.purchasing.po.create', [$order]);
    }
}
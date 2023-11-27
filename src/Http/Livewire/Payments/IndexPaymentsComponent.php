<?php

namespace Obelaw\Accounting\Http\Livewire\Payments;

use Obelaw\UI\Permissions\Access;
use Obelaw\UI\Renderer\GridRender;

#[Access('accounting_payments_index')]
class IndexPaymentsComponent extends GridRender
{
    public $gridId = 'obelaw_accounting_payments_index';

    protected $pretitle = 'Payments';
    protected $title = 'Payments listing';
}

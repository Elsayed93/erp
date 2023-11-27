<?php

namespace Obelaw\Accounting\Http\Livewire\Vendors;

use Obelaw\UI\Permissions\Access;
use Obelaw\UI\Renderer\GridRender;

#[Access('accounting_vendors_index')]
class IndexVendorsComponent extends GridRender
{
    public $gridId = 'obelaw_accounting_vendors_index';

    protected $pretitle = 'Vendors';
    protected $title = 'Vendors listing';
}

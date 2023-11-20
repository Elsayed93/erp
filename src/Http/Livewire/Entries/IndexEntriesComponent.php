<?php

namespace Obelaw\Accounting\Http\Livewire\Entries;

use Obelaw\Framework\Base\GridBase;

#[PermissionAccess('accounting_entries_index')]
class IndexEntriesComponent extends GridBase
{
    public $gridId = 'obelaw_accounting_entries_index';

    protected $pretitle = 'Entries';
    protected $title = 'Entries listing';
}

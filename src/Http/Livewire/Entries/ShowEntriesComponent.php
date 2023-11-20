<?php

namespace Obelaw\Accounting\Http\Livewire\Entries;

use Obelaw\Accounting\Model\AccountEntry;
use Obelaw\Framework\Base\ViewBase;

#[PermissionAccess('accounting_entries_show')]
class ShowEntriesComponent extends ViewBase
{
    public $entry = null;
    public $viewId = 'obelaw_accounting_entry_view';

    protected $pretitle = 'Entries';
    protected $title = 'Entry show';

    public function mount(AccountEntry $entry)
    {
        $this->parameters(['entry' => $entry]);
    }
}

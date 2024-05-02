<?php

namespace Obelaw\Accounting\Livewire\Reporting;

use Livewire\Component;
use Obelaw\Accounting\Facades\Accounts;
use Obelaw\Permissions\Attributes\Access;
use Obelaw\Permissions\Traits\BootPermission;
use Obelaw\UI\Views\Layout\DashboardLayout;

#[Access('accounting_reporting_coa')]
class TheCOAReporting extends Component
{
    use BootPermission;

    public function render()
    {
        return view('obelaw-accounting::reporting.coa', [
            'accounts_count' => Accounts::getCount(),
            'accounts' => Accounts::getParentOnly(),
        ])->layout(DashboardLayout::class);
    }
}

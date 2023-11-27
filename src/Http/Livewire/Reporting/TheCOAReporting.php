<?php

namespace Obelaw\Accounting\Http\Livewire\Reporting;

use Livewire\Component;
use Obelaw\Accounting\Model\Account;
use Obelaw\UI\Permissions\Access;
use Obelaw\UI\Permissions\Traits\BootPermission;
use Obelaw\UI\Views\Layout\DashboardLayout;

#[Access('accounting_reporting_coa')]
class TheCOAReporting extends Component
{
    use BootPermission;

    public function render()
    {
        return view('obelaw-accounting::reporting.coa', [
            'accounts_count' => Account::count(),
            'accounts' => Account::where('parent_account', null)->get(),
        ])->layout(DashboardLayout::class);
    }
}

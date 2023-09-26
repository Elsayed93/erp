<?php

namespace Obelaw\Accounting\Http\Livewire\COA;

use Obelaw\Accounting\Model\Account;
use Obelaw\Accounting\Views\Layout;
use Obelaw\Framework\Base\FromBase;
use Obelaw\Framework\Contracts\HasDoSubmit;

class CreateComponent extends FromBase implements HasDoSubmit
{
    public $formId = 'obelaw_accounting_account_form';

    protected $pretitle = 'COA';
    protected $title = 'Create new account';

    public function layout()
    {
        return Layout::class;
    }

    public function doSubmit($validateData)
    {
        if ($parentId = $this->parent_account) {
            $parentAccount = Account::find($parentId);

            if ($parentAccount->type != $this->type) {
                return $this->pushAlert('error', 'It is not possible to choose a different account type than the parent account');
            }
        }

        $account = Account::create($validateData);

        if ($account) {
            return $this->pushAlert('success', 'The account has been created');
        }
    }
}

<?php

use Obelaw\Accounting\Model\Vendor;
use Obelaw\Schema\Grid\Button;
use Obelaw\Schema\Grid\CTA;
use Obelaw\Schema\Grid\Table;
use Obelaw\Schema\Grid\Button\RouteAction;

return new class
{
    public $model = Vendor::class;

    public function createButton(Button $button)
    {
        $button->setButton(
            label: 'Create New Vendor',
            route: 'obelaw.purchasing.vendors.create',
            permission: 'accounting_vendors_create',
        );
    }

    public function table(Table $table)
    {
        $table->setColumn('#', 'id')
            ->setColumn('Name', 'name')
            ->setColumn('Phone', 'phone');
    }

    public function CTA(CTA $CTA)
    {
        $CTA->setCall('Show', new RouteAction(
            href: 'obelaw.purchasing.vendors.show',
            permission: 'purchasing_vendors_show',
        ));

        $CTA->setCall('Update', new RouteAction(
            color: 'info',
            href: 'obelaw.purchasing.vendors.update',
            permission: 'accounting_vendors_update',
        ));
    }
};
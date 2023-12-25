<?php

namespace Obelaw\Accounting\Facades;

use Illuminate\Support\Facades\Facade;

class PriceLists extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'obelaw.accounting.price-list';
    }
}

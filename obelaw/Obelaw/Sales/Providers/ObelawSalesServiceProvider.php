<?php

namespace Obelaw\Sales\Providers;

use Livewire\Livewire;
use Obelaw\Framework\Base\ServiceProviderBase;
use Obelaw\Sales\Lib\Repositories\CustomerRepositoryInterface;
use Obelaw\Sales\Lib\Repositories\Eloquent\CustomerRepository;
use Obelaw\Sales\Lib\Repositories\Eloquent\SalesOrderRepository;
use Obelaw\Sales\Lib\Repositories\SalesOrderRepositoryInterface;
use Obelaw\Sales\Lib\Services\SalesOrderService;
use Obelaw\Sales\Livewire\Coupons\CreateCouponComponent;
use Obelaw\Sales\Livewire\Coupons\IndexCouponsComponent;
use Obelaw\Sales\Livewire\Coupons\UpdateCouponComponent;
use Obelaw\Sales\Livewire\Customers\CreateCustomerComponent;
use Obelaw\Sales\Livewire\Customers\IndexCustomersComponent;
use Obelaw\Sales\Livewire\Customers\UpdateCustomerComponent;
use Obelaw\Sales\Livewire\Reporting\SalesAnalysisReporting;
use Obelaw\Sales\Livewire\SalesOrder\CreateSalesOrder;
// use Obelaw\Sales\Services\SalesOrderService;
use Obelaw\Sales\Livewire\SalesOrder\IndexCreateSalesComponent;
use Obelaw\Sales\Livewire\SalesOrder\OpenSalesOrderComponent;
use Obelaw\Sales\Utilities\VirtualCheckoutManagement;

class ObelawSalesServiceProvider extends ServiceProviderBase
{

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(CustomerRepositoryInterface::class, CustomerRepository::class);
        $this->app->bind(SalesOrderRepositoryInterface::class, SalesOrderRepository::class);

        $this->app->singleton('sales.virtualcart', VirtualCheckoutManagement::class);
        // $this->app->singleton('sales.sales_order', SalesOrderService::class);

        $this->app->singleton('sales.salesorders', SalesOrderService::class);

        $this->mergeConfigFrom(
            __DIR__ . '/../config/sales.php',
            'obelaw.erp.sales'
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'obelaw-sales');

        Livewire::component('obelaw-sales-sales-order-index', IndexCreateSalesComponent::class);
        Livewire::component('obelaw-sales-sales-order-create', CreateSalesOrder::class);
        Livewire::component('obelaw-sales-sales-order-open', OpenSalesOrderComponent::class);

        Livewire::component('obelaw-sales-sales-customers-index', IndexCustomersComponent::class);
        Livewire::component('obelaw-sales-sales-customers-create', CreateCustomerComponent::class);
        Livewire::component('obelaw-sales-sales-customers-update', UpdateCustomerComponent::class);

        Livewire::component('obelaw-sales-coupons-index', IndexCouponsComponent::class);
        Livewire::component('obelaw-sales-coupons-create', CreateCouponComponent::class);
        Livewire::component('obelaw-sales-coupons-update', UpdateCouponComponent::class);

        Livewire::component('obelaw-sales-analysis-reporting', SalesAnalysisReporting::class);
    }
}

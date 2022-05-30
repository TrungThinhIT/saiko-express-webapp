<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Http;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public static $auth_host,
        $accounting_host,
        $product_host,
        $order_host,
        $warehouse_host,
        $notification_host;

    public function __construct()
    {
        $this->boot();
    }

    public function boot()
    {
        self::$auth_host = config('services.tomonisolution.auth.host');
        self::$accounting_host = config('services.tomonisolution.accounting.host');
        self::$product_host = config('services.tomonisolution.product.host');
        self::$order_host = config('services.tomonisolution.order.host');
        self::$warehouse_host = config('services.tomonisolution.warehouse.host');
        self::$notification_host = config('services.tomonisolution.notification.host');
    }
}

<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        'request-tracking/app/create-tracking*',
        'Api/Ref*',
        'request-tracking/get-quanhuyen',
        'request-tracking/get-phuongxa',
        'Api/app/create-tracking*',
    ];
}

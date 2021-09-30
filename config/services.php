<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'firebase' => [
        'apiKey' => env('firebase_api'),
        'authDomain' => env('firebase_authDomain'),
        'projectId' => env('firebase_projectId'),
        'storageBucket' => env('firebase_storageBucket'),
        'messagingSenderId' => env('firebase_messagingSenderId'),
        'appId' => env('firebase_appId'),
        'measurementId' => env('firebase_measurementId')
    ],

    'saiko' => [
        'password' => env('saiko_password', 'anh:M:v:-7?6?98')
    ],


    'tomonisolution' => [
        'auth' => [
            'host' => env('SERVICE_AUTH_HOST', 'https://prod-auth.tomonisolution.com'),
        ],

        'accounting' => [
            'host' => env('SERVICE_ACCOUNTING_HOST', 'https://prod-accounting.tomonisolution.com'),
        ],

        'product' => [
            'host' => env('SERVICE_PRODUCT_HOST', 'https://prod-product.tomonisolution.com'),
        ],

        'warehouse' => [
            'host' => env('SERVICE_WAREHOUSE_HOST', 'https://prod-warehouse.tomonisolution.com'),
        ],

        'order' => [
            'host' => env('SERVICE_ORDER_HOST', 'https://prod-order.tomonisolution.com'),
        ],

        'notification' => [
            'host' => env('SERVICE_NOTIFICATION_HOST', 'https://prod-notification.tomonisolution.com'),
        ],
    ]
];

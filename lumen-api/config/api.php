<?php

return [

    /*
    |--------------------------------------------------------------------------
    | API URL
    |--------------------------------------------------------------------------
    |
    | This URL is used by the console to properly generate URLs when using
    | the Artisan command line tool. You should set this to the root of
    | your application so that it is used when running Artisan tasks.
    |
    */

    'url' => env('APP_URL', 'http://localhost:8000'),

    /*
    |--------------------------------------------------------------------------
    | API Endpoints
    |--------------------------------------------------------------------------
    |
    | Define all API endpoints here.
    |
    */

    'endpoint' => [

        'product' => '/api/product/',
        'user' => '/api/user/',
        'cart' => '/api/cart/',
        'coupon' => '/api/coupon/',
    ],

];

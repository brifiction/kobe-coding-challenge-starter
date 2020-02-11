<?php

return [
    /*
    |--------------------------------------------------------------------------
    | API Endpoints
    |--------------------------------------------------------------------------
    |
    | Define all API endpoints here.
    |
    */

    'endpoint' => [
        'product' => env('APP_URL', 'http://localhost:8000').'/api/product/',
        'user' => env('APP_URL', 'http://localhost:8000').'/api/user/',
        'cart' => env('APP_URL', 'http://localhost:8000').'/api/cart/',
        'coupon' => env('APP_URL', 'http://localhost:8000').'/api/coupon/',
    ],
];

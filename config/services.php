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

    'google' => [
        'client_id' => '836713168198-4ocj72ht1phegqe93o1ltnqn6d3n0eri.apps.googleusercontent.com',
        'client_secret' => 'x-giPtTz6946Hx2jeTHrbgRM',
        'redirect' => 'http://localhost:8888/laravel/zibonshathi-backend/callback/google',
    ],


    // 'facebook' => [
    //     'client_id' => env('FACEBOOK_CLIENT_ID'),
    //     'client_secret' => env('FACEBOOK_CLIENT_SECRET'),
    //     'redirect' => 'http://localhost:8888/laravel/zibonshathi-backend/login/facebook/callback',
    // ],
    'facebook' => [
        'client_id' => '324275152071381',
        'client_secret' => '8d440fbb9526b6234510eca4aced3f91',
        'redirect' => 'http://localhost:8888/laravel/zibonshathi-backend/callback/facebook',
      ],

    'linkedin' => [
        'client_id' => '8611yhj7qznlfz',
        'client_secret' => 'KEY6pNte81L9dkj4',
        'redirect' => 'http://localhost:8888/laravel/zibonshathi-backend/callback/linkedin',
    ],

    'twitter' => [
        'client_id' => 'VaUDGlk76MBmLGL8bYzr94DaS',
        'client_secret' => 'rpkLE0XazMixIV8WQx8pztVKAlBQjLUwEZlomI67Bpu3Z3nVlm',
        'redirect' => 'http://localhost:8888/laravel/zibonshathi-backend/callback/twitter',
    ],

];

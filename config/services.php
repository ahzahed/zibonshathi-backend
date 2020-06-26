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
        'client_id' => '537211027206-01qu4ufimtrgathqi385c8blmri72521.apps.googleusercontent.com',
        'client_secret' => '2pTGglvAbtTqH0Q2OoSfD_lL',
        'redirect' => 'http://localhost:8888/laravel/zibonshathi-backend/callback/google',
    ],

    'linkedin' => [
        'client_id' => '8611yhj7qznlfz',
        'client_secret' => 'KEY6pNte81L9dkj4',
        'redirect' => 'http://localhost:8888/laravel/zibonshathi-backend/callback/linkedin',
    ],

    'facebook' => [
        'client_id' => '295207995002552',
        'client_secret' => 'a80e0477abd8507a5b7e691de2edd616',
        'redirect' => 'http://localhost:8888/laravel/zibonshathi-backend/callback/facebook',
    ],

    'twitter' => [
        'client_id' => 'VaUDGlk76MBmLGL8bYzr94DaS',
        'client_secret' => 'rpkLE0XazMixIV8WQx8pztVKAlBQjLUwEZlomI67Bpu3Z3nVlm',
        'redirect' => 'http://localhost:8888/laravel/zibonshathi-backend/callback/twitter',
    ],

];

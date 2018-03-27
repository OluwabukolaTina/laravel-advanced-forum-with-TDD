<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'github' => [
    'client_id' => env('GITHUB_CLIENT_ID'),         // Your GitHub Client ID
    'client_secret' => env('GITHUB_CLIENT_SECRET'), // Your GitHub Client Secret
    'redirect' => 'http://127.0.0.1:8000/github/redirect',

    ],

    'facebook' => [
    'client_id' => env('177701146191281'),         // Your GitHub Client ID
    'client_secret' => env('1fea5f970d5c43aaf7cb20b89c187257'), // Your GitHub Client Secret
    'redirect' => 'http://127.0.0.1:8000/facebook/redirect',

    ],

];

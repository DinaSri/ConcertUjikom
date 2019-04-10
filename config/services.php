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

    'facebook' => [
        'client_id'     => '1456446571151881',
        'client_secret' => '2cd7337a0f4a69e754e69ba3c41ee0f4',
        'redirect'      => 'http://localhost:8080/auth/facebook/callback',
    ],
    'google' => [
        'client_id'     => '584713618473-s97ureh44dpp2rjp8bimumhgci667ih9.apps.googleusercontent.com',
        'client_secret' => 'tf_vKOGxRuvn-rDd5--vpPQo',
        'redirect'      => 'http://localhost:8080/auth/google/callback',
    ],

];

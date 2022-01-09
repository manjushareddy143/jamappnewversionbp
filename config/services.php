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

    'facebook' => [
        'client_id' => '1214305158973009',
        'client_secret' => '1b23c7af529a867768c4cb8c83e81928',
        'redirect' => 'https://staging.jam-app.com/demo/public/callback/'
      ],
    'google' => [
        'client_id' => '376837783775-9hrugej41q6mmpf38g6n3i47kmcsb9nt.apps.googleusercontent.com',
        'client_secret' => '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',
        'redirect' => 'https://staging.jam-app.com/demo/public/google/callback/'
],
];

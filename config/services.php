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
    'github' => [
        'client_id' => '26bb508c8028048c12e5',
        'client_secret' => '3a37669b65144cb07c3f4228b98f2237f1f26cf0',
        'redirect' => 'http://localhost:8000/auth/callback',
    ],
    'google' => [
        'client_id' => '158426603500-o1p8ehs3ii8l93pjgfgr8netpivoquie.apps.googleusercontent.com',
        'client_secret' => 'WlCURbn0t6HPaU1dcHFTNRyW',
        'redirect' => 'http://localhost:8000/auth/callback/google',
    ]
];

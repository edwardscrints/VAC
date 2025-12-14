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
        'scheme' => 'https',
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'stripe' => [
        'public_key' => env('STRIPE_KEY'),
        'key' => env('STRIPE_SECRET'),
    ],

    'instagram' => [
        'feed' => 'https://www.instagram.com/vacultura?igsh=MXFwbWM0bGg1Mnlwbw%3D%3D',
        'url' => 'https://www.instagram.com/vacultura/',
    ],

    'spotify' => [
        'podcast_url' => 'https://open.spotify.com/user/g6jvoqid6w27i7k4lflwip32e?si=961df12986e448dc',
    ],

];

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

    // Emplacements prévus pour brancher un vrai fournisseur de paiement plus
    // tard (voir App\Services\PaymentGatewayService). Non utilisés tant que
    // le paiement est simulé.
    'orange_money' => [
        'merchant_key' => env('ORANGE_MONEY_MERCHANT_KEY'),
        'api_secret' => env('ORANGE_MONEY_API_SECRET'),
    ],

    'mtn_money' => [
        'subscription_key' => env('MTN_MONEY_SUBSCRIPTION_KEY'),
        'api_user' => env('MTN_MONEY_API_USER'),
        'api_key' => env('MTN_MONEY_API_KEY'),
    ],

];

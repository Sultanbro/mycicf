<?php

return [
    'mock' => env('KIAS_MOCK', false),

    'url' => env('KIAS_URL'),
    'auth' => [
        'login' => env('KIAS_LOGIN'),
        'password' => env('KIAS_PASSWORD')
    ],

    'cache' => [
        'lifetime' => 10
    ]
];

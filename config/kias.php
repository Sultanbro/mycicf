<?php

return [
    'mock' => [
        'enabled' => (bool)env('KIAS_MOCK_ENABLED', false),
        'delay' => env('KIAS_MOCK_DELAY', 0)
    ],

    'url' => env('KIAS_URL'),
    'auth' => [
        'login' => env('KIAS_LOGIN'),
        'password' => env('KIAS_PASSWORD')
    ],

    'cache' => [
        'lifetime' => 10
    ]
];

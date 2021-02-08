<?php

return [
    'mock' => env('MOCK_KIAS', false),

    'url' => env('KIAS_URL'),
    'auth' => [
        'login' => env('KIAS_LOGIN'),
        'password' => env('KIAS_PASSWORD')
    ],
];

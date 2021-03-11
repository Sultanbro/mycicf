<?php

return [
    'mock' => [
        'enabled' => env('NOTIFICATION_MOCK_ENABLED', false),
    ],
    'server_key' => env('SERVER_KEY'),
    'url' => 'https://fcm.googleapis.com/fcm/send'
];

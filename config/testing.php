<?php

return [
    'debugbar' => [
        'collect' => [
            'queries' => true,
            'models' => true,
            'events' => true,
            'auth' => true,
            'route' => true,
            'cache' => true,
            'time' => true,
            'kias' => true,
        ],
        'collectors' => [
            'queries' => [
                'backtrace' => true
            ]
        ]
    ]
];

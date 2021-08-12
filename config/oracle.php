<?php
return [
    'oracle' => [
        'driver' => 'oracle',
        'host' => "192.168.1.13", //env('DB_HOST', ''),
        'port' => "1521",//env('DB_PORT', '1521'),
        'database' => "KIAS", //env('DB_DATABASE', ''),
        'username' => "MYCIC",//env('DB_USERNAME', ''),
        'password' => "QwMcIcerty23#",//env('DB_PASSWORD', ''),
        'charset' => "AL32UTF8",//env('DB_CHARSET', 'AL32UTF8'),
        'prefix' => env('DB_PREFIX', ''),
        'prefix_schema' => env('DB_SCHEMA_PREFIX', ''),
        'edition' => env('DB_EDITION', 'ora$base'),
        'server_version' => "12",//env('DB_SERVER_VERSION', '11g'),
    ],
];

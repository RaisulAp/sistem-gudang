<?php

return [

    'defaults' => [
        'guard' => 'web',
        'passwords' => 'users',
    ],

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],
    ],

    'providers' => [
        'users' => [
            'driver' => 'database',
            'table' => 'users',
        ],

        // 'users' => [
        //     'driver' => 'database',eloquent
        //     'table' => 'users',
            // 'model' => App\Models\User::class,
        // ],
    ],

    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_resets',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    'password_timeout' => 10800,

    'api' => [
    'driver' => 'sanctum',
    'provider' => 'users',
    'hash' => false,
    ],

];

<?php

return [
    'default' => env('MAIL_MAILER', 'smtp'),
    'mailers' => [
        'smtp' => [
            'transport' => 'smtp',
            'host' => env('MAIL_HOST', 'smtp.sendgrid.net'),
            'port' => env('MAIL_PORT', 587),
            'encryption' => env('MAIL_ENCRYPTION', 'tls'),
            'username' => env('MAIL_USERNAME', 'apikey'),
            'password' => env('MAIL_PASSWORD'),
            'timeout' => null,
            'auth_mode' => null,
        ],
    ],
    'from' => [
        'address' => env('MAIL_FROM_ADDRESS', 'shanitahkhan874@gmail.com'),
        'name' => env('MAIL_FROM_NAME', 'WITI Student Management System'),
    ],
];

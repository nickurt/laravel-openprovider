<?php

return [

    'default' => env('OPENPROVIDER_CONNECTION', 'default'),

    'connections' => [

        'default' => [
            'host' => env('OPENPROVIDER_DEFAULT_HOST', 'https://api.openprovider.eu'),
            'username' => env('OPENPROVIDER_DEFAULT_USERNAME'),
            'password' => env('OPENPROVIDER_DEFAULT_PASSWORD'),
        ],

    ],

];
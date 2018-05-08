<?php

return [

    'default' => env('OPENPROVIDER_CONNECTION', 'default'),

    'connections' => [

        'default' => [
            'username' => env('OPENPROVIDER_DEFAULT_USERNAME'),
            'password' => env('OPENPROVIDER_DEFAULT_PASSWORD'),
        ],

        'cte' => [
            'username' => env('OPENPROVIDER_CTE_USERNAME'),
            'password' => env('OPENPROVIDER_CTE_PASSWORD'),
            'cte' => true,
        ],

    ],

];
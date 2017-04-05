<?php

return [
    'cache' => [
        'expires' => env('KEEVITAJA_BLOG_CACHE_EXPIRES', 24 * 30),
        'enabled' => env('KEEVITAJA_BLOG_CACHE_ENABLED', true),
    ],
    'images' => [
        'types' => [
            'default' => [
                'full' => [1152, null, 'resize'],
                'thumb' => [480, 240, 'fit'],
            ]
        ]
    ]
];
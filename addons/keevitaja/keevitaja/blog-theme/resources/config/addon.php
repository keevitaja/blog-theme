<?php

return [
    'cache' => [
        'expires' => env('KEEVITAJA_BLOG_CACHE_EXPIRES', 24 * 30),
        'enabled' => env('KEEVITAJA_BLOG_CACHE_ENABLED', true),
    ],
    'images' => [
        'default' => [
            0 => [480, 240, 'crop'],
            480 => [320, 160, 'crop'],
            800 => [320, 160, 'crop'],
        ]
    ]
];
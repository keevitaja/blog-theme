<?php

return [
    'cache' => [
        'expires' => env('BLOG_CACHE_EXPIRES', 60 * 24 * 30),
        'enabled' => env('BLOG_CACHE_ENABLED', true),
    ],
    'disqus'      => env('BLOG_DISQUS', 'keevitaja'),
    'crisp'      => env('BLOG_CRISP', false),
    'images' => [
        'slugs' => [
            'image' => 'image',
            'images' => 'images',
            'title' => 'title',
            'slug' => 'slug'
        ],
        'types' => [
            'default' => [
                'full' => [1152, null, 'resize'],
                'thumb' => [480, 240, 'fit'],
            ],
            'double' => [
                'full' => [1152, null, 'resize'],
                'thumb' => [480, 240, 'fit'],
            ],
            'single' => [
                'full' => [1152, null, 'resize'],
                'thumb' => [768, null, 'resize'],
            ],
            'quater' => [
                'full' => [1152, null, 'resize'],
                'thumb' => [480, 240, 'fit'],
            ],
        ]
    ],
    'ga' => env('BLOG_GA', 'UA-65451036-1'),
];

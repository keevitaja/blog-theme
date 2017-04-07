<?php

namespace Keevitaja\BlogTheme;

use Anomaly\Streams\Platform\Addon\Plugin\Plugin;
use Keevitaja\BlogTheme\GetSnippet;
use Keevitaja\BlogTheme\Support\ImageRepository;
use Twig_SimpleFunction;

class BlogThemePlugin extends Plugin
{
    public function getFunctions()
    {
        return [
            new Twig_SimpleFunction('snippet', function($slug, $language = 'php', $key = 'post') {
                return app(GetSnippet::class, ['slug' => $slug, 'language' => $language, 'key' => $key]);
            }, ['is_safe' => ['html']]),
            new Twig_SimpleFunction('images', function($type, $key = 'post') {
                return app(GetImages::class, ['type' => $type, 'key' => $key]);
            }),
            new Twig_SimpleFunction('dd', function($variable) {
                return dd($variable);
            }),
        ];
    }
}
<?php

namespace Keevitaja\BlogTheme;

use Anomaly\Streams\Platform\Addon\Plugin\Plugin;
use Keevitaja\BlogTheme\GetNavigation;
use Keevitaja\BlogTheme\GetSnippet;
use Keevitaja\BlogTheme\Support\ImageRepository;
use Twig_SimpleFunction;
use Twig_SimpleFilter;

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

    public function getFilters()
    {
        return [
            new Twig_SimpleFilter('code', function($data) {
                $replace = '<pre><code class="language-$1">$2</code></pre>';

                return preg_filter("/::code-([a-z]+)\n((.|\n)*?)\n::/", $replace, (string)$data);
            })
        ];
    }
}
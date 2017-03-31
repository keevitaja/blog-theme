<?php

namespace Keevitaja\BlogTheme;

use Anomaly\Streams\Platform\Addon\Plugin\Plugin;
use Keevitaja\BlogTheme\Commands\GetMix;
use Keevitaja\BlogTheme\Commands\GetSnippet;
use Twig_SimpleFunction;

class BlogThemePlugin extends Plugin
{
    public function getFunctions()
    {
        return [
            new Twig_SimpleFunction('mix', function($path, $manifestDirectory = '') {
                return dispatch(new GetMix($path, $manifestDirectory));
            }),
            new Twig_SimpleFunction('snippet', function($slug, $language = 'php', $key = 'post') {
                return dispatch(new GetSnippet($slug, $language, $key));
            }, ['is_safe' => ['html']]),
            new Twig_SimpleFunction('dd', function($variable) {
                return dd($variable);
            }),
        ];
    }
}
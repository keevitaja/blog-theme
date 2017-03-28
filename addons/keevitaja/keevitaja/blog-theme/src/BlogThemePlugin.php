<?php

namespace Keevitaja\BlogTheme;

use Anomaly\Streams\Platform\Addon\Plugin\Plugin;
use Illuminate\Support\HtmlString;
use Twig_SimpleFunction;

class BlogThemePlugin extends Plugin
{
    public function getFunctions()
    {
        return [
            new Twig_SimpleFunction('mix', function($path, $manifestDirectory = '') {
                static $manifest;

                if (! starts_with($path, '/')) {
                    $path = "/{$path}";
                }

                if ($manifestDirectory && ! starts_with($manifestDirectory, '/')) {
                    $manifestDirectory = "/{$manifestDirectory}";
                }

                if (file_exists(public_path($manifestDirectory.'/hot'))) {
                    return new HtmlString("http://localhost:8080{$path}");
                }

                if (! $manifest) {
                    if (! file_exists($manifestPath = public_path($manifestDirectory.'/mix-manifest.json'))) {
                        throw new Exception('The Mix manifest does not exist.');
                    }
                    $manifest = json_decode(file_get_contents($manifestPath), true);
                }

                if (! array_key_exists($path, $manifest)) {
                    throw new Exception(
                        "Unable to locate Mix file: {$path}. Please check your ".
                        'webpack.mix.js output paths and try again.'
                    );
                }

                return new HtmlString($manifestDirectory.$manifest[$path]);
            })
        ];
    }
}
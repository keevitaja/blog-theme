<?php

namespace Keevitaja\BlogTheme\Support;

class CacheManager
{
    public function remember($key, $callback)
    {
        $config = config('keevitaja.theme.blog::addon');

        if ( ! $config['enabled'] || config('app.debug')) return $callback();

        return cache()->remember($key, $config['expires'], $callback);
    }
}
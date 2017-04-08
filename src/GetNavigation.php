<?php

namespace Keevitaja\BlogTheme;

use Keevitaja\BlogTheme\CacheManager;

class GetNavigation
{
    protected $menu;

    protected $cache;

    public function __construct(CacheManager $cache, $menu)
    {
        $this->menu = $menu;
        $this->cache = $cache;
    }

    public function __toString()
    {
        $key = 'keevitaja.blog.navigation';

        return $this->cache->remember($key, function() {
            return $this->build();
        });
    }

    protected function build()
    {
        return view('keevitaja.theme.blog::partials.navigation', [
            'menu' => $this->menu
        ])->render();
    }
}
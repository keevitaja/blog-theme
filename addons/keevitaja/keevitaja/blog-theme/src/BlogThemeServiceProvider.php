<?php namespace Keevitaja\BlogTheme;

use Anomaly\Streams\Platform\Addon\AddonServiceProvider;

class BlogThemeServiceProvider extends AddonServiceProvider
{

    protected $plugins = [
        'Keevitaja\BlogTheme\BlogThemePlugin'
    ];

    protected $commands = [];

    protected $routes = [];

    protected $middleware = [];

    protected $listeners = [];

    protected $aliases = [];

    protected $bindings = [];

    protected $providers = [];

    protected $singletons = [];

    protected $overrides = [
        'anomaly.module.posts::posts/index'      => 'keevitaja.theme.blog::posts/index',
        'anomaly.module.posts::posts/view'       => 'keevitaja.theme.blog::posts/view',
        'anomaly.module.posts::categories/index' => 'keevitaja.theme.blog::categories/index',
    ];

    protected $mobile = [];

    public function register()
    {
    }

    public function map()
    {
    }

}

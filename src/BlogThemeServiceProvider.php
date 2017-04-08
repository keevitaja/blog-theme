<?php namespace Keevitaja\BlogTheme;

use Anomaly\FilesModule\File\FileModel;
use Anomaly\FilesModule\Folder\FolderModel;
use Anomaly\PagesModule\Page\PageModel;
use Anomaly\PostsModule\Post\PostModel;
use Anomaly\Streams\Platform\Addon\AddonServiceProvider;
use Keevitaja\BlogTheme\Observers\ModelObserver;

class BlogThemeServiceProvider extends AddonServiceProvider
{

    protected $plugins = [
        'Keevitaja\BlogTheme\BlogThemePlugin'
    ];

    protected $overrides = [
        'anomaly.module.posts::posts/index'      => 'keevitaja.theme.blog::posts/index',
        'anomaly.module.posts::posts/view'       => 'keevitaja.theme.blog::posts/view',
        'anomaly.module.posts::categories/index' => 'keevitaja.theme.blog::posts/categories/index',
        'anomaly.module.posts::tags/index'       => 'keevitaja.theme.blog::posts/tags/index',
    ];

    public function boot()
    {
        \Event::listen(['eloquent.saved: *', 'eloquent.deleted: *'], function($event) {
            cache()->flush();
        });
    }
}

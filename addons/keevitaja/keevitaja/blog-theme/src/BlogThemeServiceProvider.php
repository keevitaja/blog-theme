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
        'anomaly.module.posts::categories/index' => 'keevitaja.theme.blog::categories/index',
    ];

    public function boot()
    {
        PostModel::observe(ModelObserver::class);
        PageModel::observe(ModelObserver::class);
        FileModel::observe(ModelObserver::class);
        FolderModel::observe(ModelObserver::class);
    }
}

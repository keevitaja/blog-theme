<?php

namespace Keevitaja\BlogTheme;

use Anomaly\FilesModule\File\FileModel;
use Anomaly\Streams\Platform\View\ViewTemplate;
use Keevitaja\BlogTheme\CacheManager;

class GetImages
{
    protected $template;

    protected $file;

    protected $type;

    protected $config;

    protected $cache;

    protected $container = [];

    public function __construct(ViewTemplate $template, FileModel $file, CacheManager $cache, $type)
    {
        $this->template = $template;
        $this->file = $file;
        $this->cache = $cache;
        $this->type = $type;
        $this->config = config('keevitaja.theme.blog::addon.images');
    }

    public function __call($method, $args)
    {
        $this->container[][$method] = $args;

        return $this;
    }

    public function __toString()
    {
        return $this->get();
    }

    public function get()
    {
        $key = 'keevitaja.blog.'.serialize($this->container);

        return $this->cache->remember($key, function() {
            return $this->build();
        });
    }

    protected function build()
    {
        $images = [];

        foreach ($this->container as $collection) {
            foreach ($collection as $method => $args) {
                if (method_exists($this, $method)) {
                    $images = array_merge($images, $this->{$method}($args));
                }
            }
        }

        return view('keevitaja.theme.blog::partials.images', [
            'type' => $this->type,
            'images' => $this->render($images)
        ])->render();
    }

    protected function render($raw)
    {
        $config = $this->config['types'][$this->type];
        $images = [];

        foreach ($raw as $image) {
            $images[] = [
                'full' => $image['image']->{$config['full'][2]}($config['full'][0], $config['full'][1])->url(),
                'thumb' => $image['image']->{$config['thumb'][2]}($config['thumb'][0], $config['thumb'][1])->url(),
                'title' => $image['title'],
            ];
        }

        return $images;
    }

    protected function folders($args)
    {
        $files = $this->file->whereHas('folder', function($q) use($args) {
            $q->whereIn('id', $args);
        })->get();

        return $this->rawImages($files);
    }

    protected function files($args)
    {
        return $this->rawImages($this->file->whereIn('id', $args)->get());
    }

    protected function rawImages($files)
    {
        $images = [];
        $title = $this->config['slugs']['title'];

        foreach($files as $file) {
            $images[] = [
                'image' => $file->image(),
                'title' => $file->entry ? $file->entry->{$title} : ''
            ];
        }

        return $images;
    }

    protected function post($args)
    {
        return $this->template($args, 'post');
    }

    protected function page($args)
    {
        return $this->template($args, 'page');
    }

    protected function template($args, $type)
    {
        $images = [];
        $slugs = $this->config['slugs'];

        foreach ($this->template->get($type)->{$slugs['images']}->whereIn($slugs['slug'], $args) as $file) {
            $images[] = [
                'image' => $file->{$slugs['image']}->image,
                'title' => $file->{$slugs['title']} ? $file->{$slugs['title']}->value : ''
            ];
        }

        return $images;
    }
}
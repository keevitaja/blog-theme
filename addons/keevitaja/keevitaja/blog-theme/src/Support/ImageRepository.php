<?php

namespace Keevitaja\BlogTheme\Support;

use Anomaly\FilesModule\File\FileModel;
use Anomaly\Streams\Platform\View\ViewTemplate;
use Keevitaja\BlogTheme\Support\CacheManager;

class ImageRepository
{
    protected $template;

    protected $file;

    protected $type;

    protected $config;

    protected $cache;

    protected $container = [
        'template' => [],
        'files' => [],
        'folders' => []
    ];

    public function __construct(ViewTemplate $template, FileModel $file, CacheManager $cache, $type)
    {
        $this->template = $template;
        $this->file = $file;
        $this->cache = $cache;
        $this->type = $type;
        $this->config = config('keevitaja.theme.blog::addon.images');
    }

    public function post(...$slugs)
    {
        return $this->template($slugs, 'post');
    }

    public function files(...$ids)
    {
        $this->container['files'] = $ids;

        return $this;
    }

    public function template(array $slugs, $key)
    {
        $this->container['template'][$key] = $slugs;

        return $this;
    }

    public function get()
    {
        $key = 'keevitaja.blog.'.serialize($this->container);

        $images = $this->cache->remember($key, function() {
            return $this->getImages();
        });

        return view('keevitaja.theme.blog::partials.images', [
            'type' => $this->type,
            'images' => $images
        ])->render();
    }

    protected function getImages()
    {
        $rawImages = $this->buildTemplateImages();
        $rawImages = $this->buildFileImages($rawImages);

        $images = [];

        foreach ($rawImages as $image) {
            $images[] = $this->renderImage($image);
        }

        return $images;
    }

    protected function renderImage($image)
    {
        $config = $this->config['types'][$this->type];

        return [
            'full' => $image['image']->{$config['full'][2]}($config['full'][0], $config['full'][1])->url(),
            'thumb' => $image['image']->{$config['thumb'][2]}($config['thumb'][0], $config['thumb'][1])->url(),
            'title' => $image['title'],
        ];
    }

    protected function buildTemplateImages($images = [])
    {
        foreach ($this->container['template'] as $key => $slugs) {
            $files = $this->template->get($key)->images->whereIn('slug', $slugs);
            $slugs = $this->config['slugs'];

            foreach ($files as $file) {
                $images[] = [
                    'image' => $file->{$slugs['image']}->image,
                    'title' => $file->{$slugs['title']}->value ?? ''
                ];
            }
        }

        return $images;
    }

    protected function buildFileImages($images = [])
    {
        $files = $this->file->whereIn('id', $this->container['files'])->get();
        $slugs = $this->config['slugs'];

        foreach ($files as $file) {
            $images[] = [
                'image' => $file->image(),
                'title' => $file->{$slugs['title']} ?? ''
            ];
        }

        return $images;
    }

    public function __toString()
    {
        return $this->get();
    }
}
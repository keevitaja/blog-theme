<?php

namespace Keevitaja\BlogTheme\Support;

use Anomaly\Streams\Platform\Support\Decorator;
use Anomaly\Streams\Platform\View\ViewTemplate;

class ImageRepository
{
    protected $type;

    protected $template;

    protected $config;

    protected $container = [];

    public function __construct(ViewTemplate $template, $type)
    {
        $this->template = $template;
        $this->type = $type;
        $this->config = config('keevitaja.theme.blog::addon.images');
    }

    public function post(...$slugs)
    {
        return $this->template($slugs, 'post');
    }

    public function template(array $slugs, $key)
    {
        $this->container['template'][$key] = $slugs;

        return $this;
    }

    public function get()
    {
        $images = $this->getImages();

        return view('keevitaja.theme.blog::partials.images', [
            'type' => $this->type,
            'images' => $images
        ])->render();
    }

    protected function getImages()
    {
        $rawImages = $this->buildTemplateImages();

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
        foreach ($this->container['template'] ?? [] as $key => $slugs) {
            $files = $this->template->get($key)->images->whereIn('slug', $slugs);

            foreach ($files as $file) {
                $images[] = [
                    'image' => $file->image->image,
                    'title' => $file->title->value ?? ''
                ];
            }
        }

        return $images;
    }

    public function __toString()
    {
        return $this->get();
    }
}
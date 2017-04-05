<?php

namespace Keevitaja\BlogTheme\Support;

use Anomaly\Streams\Platform\Support\Decorator;
use Anomaly\Streams\Platform\View\ViewTemplate;

class ImageRepository
{
    protected $type;

    protected $key;

    protected $slugs;

    protected $template;

    protected $images = [];

    protected $config;

    public function __construct(ViewTemplate $template, $type, $key)
    {
        $this->template = $template;
        $this->type = $type;
        $this->key = $key;
        $this->config = config('keevitaja.theme.blog::addon.images');
    }

    public function local(...$slugs)
    {
        $files = $this->template->get($this->key)->images->whereIn('slug', $slugs);

        foreach ($files as $file) {
            $this->images[] = $file->image->image;
        }

        return $this->get();
    }

    public function get()
    {
        $images = [];

        $config = $this->config[$this->type];
        $full = $config['full'];
        $thumb = $config['thumb'];

        foreach ($this->images as $image) {
            $images[] = [
                'full' => $image->{$full[2]}($full[0], $full[1])->url(),
                'thumb' => $image->{$thumb[2]}($thumb[0], $thumb[1])->url(),
            ];
        }

        return view('keevitaja.theme.blog::partials.images', [
            'type' => $this->type,
            'images' => $images
        ])->render();
    }
}
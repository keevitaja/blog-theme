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

        foreach ($this->config[$this->type] as $breakpoint => $config) {
            list($w, $h, $t) = $config;

            foreach ($this->images as $image) {
                $images[] = $image->{$t}($w, $h)->url();
            }
        }

        return view('keevitaja.theme.blog::partials.images', [
            'type' => $this->type,
            'images' => $images
        ])->render();
    }
}
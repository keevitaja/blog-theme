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

    public function __construct(ViewTemplate $template)
    {
        $this->template = $template;
    }

    public function type($type, $key)
    {
        $this->type = $type;
        $this->key = $key;

        return $this;
    }

    public function local($slugs = [])
    {
        $this->slugs = $slugs;

        return $this;
    }

    public function get()
    {
        $images = $this->template->get($this->key)->images->whereIn('slug', $this->slugs);

        //dd($images->first()->image->image->resize(200)->url());

        return view('keevitaja.theme.blog::partials.images', [
            'type' => $this->type,
            'images' => $images
        ])->render();
    }

    public function __toString()
    {
        return $this->get();
    }
}
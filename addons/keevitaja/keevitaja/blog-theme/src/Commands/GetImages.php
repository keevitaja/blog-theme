<?php

namespace Keevitaja\BlogTheme\Commands;

use Anomaly\Streams\Platform\View\ViewTemplate;

class GetImages
{
    protected $type;

    protected $key;

    public function __construct($type, $key = 'post')
    {
        $this->type = $type;
        $this->key = $key;
    }

    public function handle(ViewTemplate $template)
    {
        // $images = $template->get($this->key)->images->whereIn('slug', $this->slugs);

        // return view('keevitaja.theme.blog::partials.images', [
        //     'images' => $images
        // ])->render();
    }

    protected function tagify($code)
    {
        return '<pre><code class="language-'.$this->language.'">'.htmlspecialchars($code).'</code></pre>';
    }
}
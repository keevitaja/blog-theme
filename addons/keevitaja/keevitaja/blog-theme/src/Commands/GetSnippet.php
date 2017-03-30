<?php

namespace Keevitaja\BlogTheme\Commands;

use Anomaly\Streams\Platform\View\ViewTemplate;

class GetSnippet
{
    protected $slug;

    protected $language;

    protected $key;

    public function __construct($slug, $language = 'markup', $key = 'post')
    {
        $this->slug = $slug;
        $this->language = $language;
        $this->key = $key;
    }

    public function handle(ViewTemplate $template)
    {
        $code = $template->get($this->key)->snippets->where('slug', $this->slug)->first()->code->value;

        return $this->tagify($code);
    }

    protected function tagify($code)
    {
        return '<pre><code class="language-'.$this->language.'">'.htmlspecialchars($code).'</code></pre>';
    }
}
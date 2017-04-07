<?php

namespace Keevitaja\BlogTheme;

use Anomaly\Streams\Platform\View\ViewTemplate;
use Keevitaja\BlogTheme\CacheManager;

class GetSnippet
{
    protected $slug;

    protected $language;

    protected $key;

    protected $template;

    protected $cache;

    public function __construct(
        ViewTemplate $template,
        CacheManager $cache,
        $slug, $language = 'markup', $key = 'post'
    ) {
        $this->slug = $slug;
        $this->language = $language;
        $this->key = $key;
        $this->template = $template;
        $this->cache = $cache;
    }

    public function __toString()
    {
        $key = 'keevitaja.blog.'.$this->slug.$this->language.$this->key;

        return $this->cache->remember($key, function() {
            return $this->build();
        });
    }

    protected function build()
    {
        $code = $this->template->get($this->key)->snippets->where('slug', $this->slug)->first()->code->value;

        return $this->tagify($code);
    }

    protected function tagify($code)
    {
        return '<pre><code class="language-'.$this->language.'">'.htmlspecialchars($code).'</code></pre>';
    }
}
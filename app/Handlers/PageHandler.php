<?php

namespace Blog\Handlers;

use Blog\Page;

class PageHandler
{
    protected $page;

    public function __construct(Page $page)
    {
        $this->page = $page;
    }

    public function handle($id)
    {
        $page = $this->page->findOrFail($id);

        return $page->content;
    }
}
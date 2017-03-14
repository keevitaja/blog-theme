<?php

namespace Blog\Handlers;

use Blog\Page;

class PageHandler
{
    /**
     * Page model
     *
     * @var \Blog\Page
     */
    protected $page;

    public function __construct(Page $page)
    {
        $this->page = $page;
    }

    /**
     * Handle the incoming request
     *
     * @param integer $id
     *
     * @return \Illuminate\Http\Response
     */
    public function handle($id)
    {
        $content = $this->page->findOrFail($id)->content;

        return view('page', ['content' => $content]);
    }
}
<?php

namespace Blog\Http\Controllers\Admin;

use Blog\Content;
use Blog\Http\Controllers\Controller;
use Blog\Http\Requests\Admin\PageRequest;
use Blog\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display a listing of the pages.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Page $page)
    {
        return view('admin.page.index', ['pages' => $page->with('content')->get()]);
    }

    /**
     * Show the form for creating a new page.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.page.create');
    }

    /**
     * Store a newly created page in storage.
     *
     * @param  \Blog\Http\Requests\Admin\PageRequest  $request
     * @param  \Blog\Content $content
     *
     * @return \Illuminate\Http\Response
     */
    public function store(PageRequest $request, Content $content)
    {
        $page = $content->create($request->all())->page()->create([]);

        $page->route()->create([
            'type' => 'page',
            'uri' => $request->get('uri')
        ]);

        session()->flash('success', 'admin.messages.page.stored');

        return redirect()->route('admin.page.edit', $page->id);
    }

    /**
     * Show the form for editing the specified page.
     *
     * @param  \Blog\Page $page
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        return view('admin.page.edit', ['page' => $page]);
    }

    /**
     * Update the specified page in storage.
     *
     * @param  \Blog\Http\Requests\Admin\PageRequest  $request
     * @param  \Blog\Page $page
     *
     * @return \Illuminate\Http\Response
     */
    public function update(PageRequest $request, Page $page)
    {
        $page->content->update($request->all());
        $page->route->update($request->only('uri'));

        session()->flash('success', 'admin.messages.page.updated');

        return back();
    }

    /**
     * Remove the specified page from storage.
     *
     * @param  \Blog\Page $page
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        $page->route->delete();
        $page->content->delete();

        session()->flash('success', 'admin.messages.page.deleted');

        return back();
    }
}

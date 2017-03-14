<?php

namespace Blog\Http\Controllers\Admin;

use Blog\Tag;
use Blog\Http\Controllers\Controller;
use Blog\Http\Requests\Admin\TagRequest;

class TagController extends Controller
{
    /**
     * Display a listing of the tags.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Tag $tag)
    {
        return view('admin.tag.index', ['tags' => $tag->get()]);
    }

    /**
     * Show the form for creating a new tag.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tag.create');
    }

    /**
     * Store a newly created tag in storage.
     *
     * @param  \Blog\Http\Requests\Admin\TagRequest  $request
     * @param  \Blog\Tag $tag
     *
     * @return \Illuminate\Http\Response
     */
    public function store(TagRequest $request, Tag $tag)
    {
        $tag = $tag->create($request->only('slug'));

        session()->flash('success', 'admin.messages.tag.stored');

        return redirect()->route('admin.tag.edit', $tag->id);
    }

    /**
     * Show the form for editing the specified tag.
     *
     * @param  \Blog\Tag $tag
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        return view('admin.tag.edit', ['tag' => $tag]);
    }

    /**
     * Update the specified tag in storage.
     *
     * @param  \Blog\Http\Requests\Admin\PageRequest  $request
     * @param  \Blog\Tag $tag
     *
     * @return \Illuminate\Http\Response
     */
    public function update(TagRequest $request, Tag $tag)
    {
        $tag->update($request->only('slug'));

        session()->flash('success', 'admin.messages.tag.updated');

        return back();
    }

    /**
     * Remove the specified tag from storage.
     *
     * @param  \Blog\Tag $tag
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();

        session()->flash('success', 'admin.messages.tag.deleted');

        return back();
    }
}

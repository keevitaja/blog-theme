<?php

namespace Blog\Http\Controllers\Admin;

use Blog\Snippet;
use Blog\Http\Controllers\Controller;
use Blog\Http\Requests\Admin\SnippetRequest;

class SnippetController extends Controller
{
    /**
     * Display a listing of the snippets.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Snippet $snippet)
    {
        return view('admin.snippet.index', ['snippets' => $snippet->get()]);
    }

    /**
     * Show the form for creating a new snippet.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.snippet.create');
    }

    /**
     * Store a newly created snippet in storage.
     *
     * @param  \Blog\Http\Requests\Admin\SnippetRequest  $request
     * @param  \Blog\Snippet $snippet
     *
     * @return \Illuminate\Http\Response
     */
    public function store(SnippetRequest $request, Snippet $snippet)
    {
        $snippet = $snippet->create($request->all());

        session()->flash('success', 'admin.messages.snippet.stored');

        return redirect()->route('admin.snippet.edit', $snippet->id);
    }

    /**
     * Show the form for editing the specified snippet.
     *
     * @param  \Blog\Snippet $snippet
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Snippet $snippet)
    {
        return view('admin.snippet.edit', ['snippet' => $snippet]);
    }

    /**
     * Update the specified snippet in storage.
     *
     * @param  \Blog\Http\Requests\Admin\PageRequest  $request
     * @param  \Blog\Snippet $snippet
     *
     * @return \Illuminate\Http\Response
     */
    public function update(SnippetRequest $request, Snippet $snippet)
    {
        $snippet->update($request->all());

        session()->flash('success', 'admin.messages.snippet.updated');

        return back();
    }

    /**
     * Remove the specified snippet from storage.
     *
     * @param  \Blog\Snippet $snippet
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Snippet $snippet)
    {
        $snippet->delete();

        session()->flash('success', 'admin.messages.snippet.deleted');

        return back();
    }
}

<?php

namespace Blog\Http\Controllers\Admin;

use Blog\Category;
use Blog\Http\Controllers\Controller;
use Blog\Http\Requests\Admin\CategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the categories.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Category $category)
    {
        return view('admin.category.index', ['categories' => $category->get()]);
    }

    /**
     * Show the form for creating a new category.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created page in storage.
     *
     * @param  \Blog\Http\Requests\Admin\CategoryRequest  $request
     * @param  \Blog\Category $category
     *
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request, Category $category)
    {
        $category = $category->create($request->only('name'));

        session()->flash('success', 'admin.messages.category.stored');

        return redirect()->route('admin.category.edit', $category->id);
    }

    /**
     * Show the form for editing the specified category.
     *
     * @param  \Blog\Category $category
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.category.edit', ['category' => $category]);
    }

    /**
     * Update the specified category in storage.
     *
     * @param  \Blog\Http\Requests\Admin\PageRequest  $request
     * @param  \Blog\Category $category
     *
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, Category $category)
    {
        $category->update($request->only('name'));

        session()->flash('success', 'admin.messages.category.updated');

        return back();
    }

    /**
     * Remove the specified category from storage.
     *
     * @param  \Blog\Category $category
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();

        session()->flash('success', 'admin.messages.category.deleted');

        return back();
    }
}

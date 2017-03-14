<nav class="nav">
    <div class="nav-left">
        <a class="nav-item">Blog</a>
    </div>

    <span class="nav-toggle">
        <span></span>
        <span></span>
        <span></span>
    </span>

    <div class="nav-right nav-menu">
        <a class="nav-item" href="{{ route('admin.page.index') }}">@lang('admin.pages')</a>
        {{-- <a class="nav-item" href="{{ route('admin.post.index') }}">@lang('admin.posts')</a> --}}
        <a class="nav-item" href="{{ route('admin.category.index') }}">@lang('admin.categories')</a>
        <a class="nav-item" href="{{ route('admin.tag.index') }}">@lang('admin.tags')</a>
        <a class="nav-item" href="{{ route('admin.snippet.index') }}">@lang('admin.snippets')</a>
    </div>
</nav>
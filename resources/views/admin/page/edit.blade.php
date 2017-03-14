@extends('admin.app')

@section('content')
    <main class="container">
        <h1 class="title">@lang('admin.pages')</h1>

        <div class="tabs">
            <ul>
                <li class="is-active">
                    <a class="tab-selector" id="content">@lang('admin.content')</a>
                </li>
                <li>
                    <a class="tab-selector" id="seo">@lang('admin.seo')</a>
                </li>
            </ul>
        </div>

        <div class="tabs-content">
            <form action="{{ route('admin.page.update', $page->id) }}" method="POST">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="PATCH">

                <div class="tab is-active" id="tab-content">
                    <label class="label">@lang('admin.title')</label>
                    <p class="control">
                        <input class="input" type="text" name="title" value="{{ old('title', $page->content->title) }}">
                    </p>

                    <label class="label">@lang('admin.uri')</label>
                    <p class="control">
                        <input class="input" type="text" name="uri" value="{{ old('uri', $page->route->uri) }}">
                    </p>

                    <label class="label">@lang('admin.body')</label>
                    <p class="control">
                        <textarea class="textarea" name="body">{{ old('body', $page->content->body) }}</textarea>
                    </p>
                </div>

                <div class="tab" id="tab-seo">
                    <label class="label">@lang('admin.meta_title')</label>
                    <p class="control">
                        <input class="input" type="text" name="meta_title" value="{{ old('meta_title', $page->content->meta_title) }}">
                    </p>

                    <label class="label">@lang('admin.meta_description')</label>
                    <p class="control">
                        <textarea class="textarea" name="meta_description">{{ old('meta_description', $page->content->meta_description) }}</textarea>
                    </p>
                </div>

                <button type="submit" class="button is-primary">@lang('admin.update')</button>
            </form>
        </div>
    </main>
@endsection
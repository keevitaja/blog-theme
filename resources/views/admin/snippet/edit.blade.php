@extends('admin.app')

@section('content')
    <main class="container">
        <h1 class="title">@lang('admin.snippets')</h1>

        <div class="tabs-content">
            <form action="{{ route('admin.snippet.update', $snippet->id) }}" method="POST">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="PATCH">

                <label class="label">@lang('admin.slug')</label>
                <p class="control">
                    <input class="input" type="text" name="slug" value="{{ old('slug', $snippet->slug) }}">
                </p>

                <label class="label">@lang('admin.body')</label>
                <p class="control">
                    <textarea class="textarea" name="body">{{ old('body', $snippet->body) }}</textarea>
                </p>

                <button type="submit" class="button is-primary">@lang('admin.update')</button>
            </form>
        </div>
    </main>
@endsection
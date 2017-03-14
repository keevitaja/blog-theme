@extends('admin.app')

@section('content')
    <main class="container">
        <h1 class="title">@lang('admin.snippets')</h1>

        <div class="tabs-content">
            <form action="{{ route('admin.snippet.store') }}" method="POST">
                {{ csrf_field() }}

                <label class="label">@lang('admin.slug')</label>
                <p class="control">
                    <input class="input" type="text" name="slug" value="{{ old('slug') }}">
                </p>

                <label class="label">@lang('admin.body')</label>
                <p class="control">
                    <textarea class="textarea" name="body">{{ old('body') }}</textarea>
                </p>

                <button type="submit" class="button is-primary">@lang('admin.create')</button>
            </form>
        </div>
    </main>
@endsection
@extends('admin.app')

@section('content')
    <main class="container">
        <h1 class="title">@lang('admin.tags')</h1>

        <div class="tabs-content">
            <form action="{{ route('admin.tag.update', $tag->id) }}" method="POST">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="PATCH">

                <label class="label">@lang('admin.slug')</label>
                <p class="control">
                    <input class="input" type="text" name="slug" value="{{ old('slug', $tag->slug) }}">
                </p>

                <button type="submit" class="button is-primary">@lang('admin.update')</button>
            </form>
        </div>
    </main>
@endsection
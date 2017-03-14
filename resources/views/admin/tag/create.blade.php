@extends('admin.app')

@section('content')
    <main class="container">
        <h1 class="title">@lang('admin.tags')</h1>

        <div class="tabs-content">
            <form action="{{ route('admin.tag.store') }}" method="POST">
                {{ csrf_field() }}

                <label class="label">@lang('admin.slug')</label>
                <p class="control">
                    <input class="input" type="text" name="slug" value="{{ old('slug') }}">
                </p>

                <button type="submit" class="button is-primary">@lang('admin.create')</button>
            </form>
        </div>
    </main>
@endsection
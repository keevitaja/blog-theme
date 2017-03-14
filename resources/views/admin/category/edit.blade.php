@extends('admin.app')

@section('content')
    <main class="container">
        <h1 class="title">@lang('admin.categories')</h1>

        <div class="tabs-content">
            <form action="{{ route('admin.category.update', $category->id) }}" method="POST">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="PATCH">

                <label class="label">@lang('admin.name')</label>
                <p class="control">
                    <input class="input" type="text" name="name" value="{{ old('name', $category->name) }}">
                </p>

                <button type="submit" class="button is-primary">@lang('admin.update')</button>
            </form>
        </div>
    </main>
@endsection
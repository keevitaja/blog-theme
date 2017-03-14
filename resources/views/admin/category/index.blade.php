@extends('admin.app')

@section('content')
    <main class="container">
        <h1 class="title">@lang('admin.categories')</h1>

        <table class="table">
            <thead>
                <tr>
                    <th>@lang('admin.name')</th>
                    <th class="actions">
                        <a href="{{ route('admin.category.create') }}">
                            @lang('admin.new')
                        </a>
                    </th>
                </tr>
            </thead>

            <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>
                            <a href="{{ route('admin.category.edit', $category->id) }}">
                                {{ $category->name }}
                            </a>
                        </td>
                        <td class="actions">
                            <form
                                action="{{ route('admin.category.destroy', $category->id) }}"
                                method="POST"
                                style="display: inline;"
                            >
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="DELETE">

                                <a class="destroy" href="{{ route('admin.category.destroy', $category->id) }}">
                                    @lang('admin.delete')
                                </a>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </main>
@endsection
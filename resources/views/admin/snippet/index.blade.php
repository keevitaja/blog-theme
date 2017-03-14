@extends('admin.app')

@section('content')
    <main class="container">
        <h1 class="title">@lang('admin.snippets')</h1>

        <table class="table">
            <thead>
                <tr>
                    <th>@lang('admin.slug')</th>
                    <th class="actions">
                        <a href="{{ route('admin.snippet.create') }}">
                            @lang('admin.new')
                        </a>
                    </th>
                </tr>
            </thead>

            <tbody>
                @foreach($snippets as $snippet)
                    <tr>
                        <td>
                            <a href="{{ route('admin.snippet.edit', $snippet->id) }}">
                                {{ $snippet->slug }}
                            </a>
                        </td>
                        <td class="actions">
                            <form
                                action="{{ route('admin.snippet.destroy', $snippet->id) }}"
                                method="POST"
                                style="display: inline;"
                            >
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="DELETE">

                                <a class="destroy" href="{{ route('admin.snippet.destroy', $snippet->id) }}">
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
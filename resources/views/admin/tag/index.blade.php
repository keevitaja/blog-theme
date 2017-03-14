@extends('admin.app')

@section('content')
    <main class="container">
        <h1 class="title">@lang('admin.tags')</h1>

        <table class="table">
            <thead>
                <tr>
                    <th>@lang('admin.slug')</th>
                    <th class="actions">
                        <a href="{{ route('admin.tag.create') }}">
                            @lang('admin.new')
                        </a>
                    </th>
                </tr>
            </thead>

            <tbody>
                @foreach($tags as $tag)
                    <tr>
                        <td>
                            <a href="{{ route('admin.tag.edit', $tag->id) }}">
                                {{ $tag->slug }}
                            </a>
                        </td>
                        <td class="actions">
                            <form
                                action="{{ route('admin.tag.destroy', $tag->id) }}"
                                method="POST"
                                style="display: inline;"
                            >
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="DELETE">

                                <a class="destroy" href="{{ route('admin.tag.destroy', $tag->id) }}">
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
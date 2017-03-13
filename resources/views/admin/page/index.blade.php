@extends('admin.app')

@section('content')
    <h1 class="title">Pages</h1>

    <div class="tabs">
        <ul>
            <li class="is-active kala  mala">
                <a class="tab-selector" id="content">@lang('admin.content')</a>
            </li>
            <li>
                <a class="tab-selector" id="seo">@lang('admin.seo')</a>
            </li>
        </ul>
    </div>

    <div class="tabs-content">
        <div class="tab is-active" id="tab-content">
            content
        </div>

        <div class="tab" id="tab-seo">
            seo
        </div>
    </div>
@endsection
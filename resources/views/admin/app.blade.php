<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <link rel="stylesheet" href="{{ asset('vendor/simplemde/simplemde.min.css') }}">
    <link rel="stylesheet" href="{{ mix('/css/admin.css') }}">
</head>
<body>
    @include('admin.partials.header')
    @include('admin.partials.messages')

    @yield('content')

    @include('admin.partials.footer')

    <script src="{{ asset('vendor/simplemde/simplemde.min.js') }}"></script>
    <script src="{{ mix('/js/admin.js') }}"></script>
</body>
</html>
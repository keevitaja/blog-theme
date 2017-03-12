<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <link rel="stylesheet" href="{{ mix('/css/admin.css') }}">
</head>
<body>
    @include('admin.partials.header')
        <main>
            @yield('content')
        </main>
    @include('admin.partials.footer')
</body>
</html>
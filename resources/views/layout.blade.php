<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{$metaData['title']}}</title>


    <link rel="stylesheet" href="/css/app.css">
    <link rel="icon" type="image/x-icon" href="/favicon.ico">
</head>
<body>
    @yield('main')
    <script src="{{ mix('/js/app.js') }}"></script>
</body>
</html>

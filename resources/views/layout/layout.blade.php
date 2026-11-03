<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'Job Hunter')</title>

    <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet">

    @stack('styles')
</head>
<body>

    @yield('content')

    @stack('scripts')

</body>
</html>

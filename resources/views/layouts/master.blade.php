<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'Trang web của Tuấn')</title>
    <link rel="stylesheet" href="{{ asset('assets/css/reset.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/fonts/stylesheet.css') }}" />

    <!-- Embed Font Google -->
    <link href="https://fonts.googleapis.com/css2?family=Sen:wght@700&display=swap" rel="stylesheet" />
</head>

<body>
    @include('parts.menu')
    @yield('content')
</body>
@yield('js')

</html>

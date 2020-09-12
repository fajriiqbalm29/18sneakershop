<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Dekasuki Oriental Food">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    @stack('prepend-style')
    @include('user.include.styles')
    @stack('addon-style')
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>
    @include('user.include.header')
    @include('user.include.hero')

    @yield('content')

    @include('user.include.footer')

    @stack('prepend-script')
    @include('user.include.script')
    @stack('addon-script')
</body>

</html>
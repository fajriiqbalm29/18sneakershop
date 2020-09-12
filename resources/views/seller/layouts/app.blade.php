<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <meta name="description" content="ShaynaAdmin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @stack('prepend-style')
    @include('seller.include.style')
    @stack('addon-style')
</head>

<body>
@include('seller.include.sidebar')
<div id="right-panel" class="right-panel">
@include('seller.include.header')
	<div class="content">
		@yield('content')
	</div>
</div>

    @stack('prepend-script')
    @include('seller.include.script')
    @stack('addon-script')
</body>
</html>

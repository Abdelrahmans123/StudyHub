<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @yield('css')
    @stack('stylesheet')
</head>
<body>
<div class="containers ">
    @auth
        <div class="menuBar">
            <button id="menu-btn">
                <i class="fa-solid fa-bars menuIcon"></i>
            </button>
        </div>
    @endauth
        @yield('content')
</div>

</div>
@yield('js')
@stack('scripts')
@stack('table')
@stack('message')
</body>
</html>

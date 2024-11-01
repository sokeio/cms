<!doctype html>
<html>
<head>
    @themeHead()
    @stack('styles')
</head>
<body @themeBodyAttr() >
    @themeBody()
    @yield('content')
    @themeBodyEnd()
    @stack('scripts')
</body>
</html>

<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    @ThemeHead(before)
    @ThemeHead(after)
    @stack('styles')
</head>

<body class="{{ theme_class() }}" :class="themeDark && 'theme-dark'" x-data="{ themeDark: false }">
    @ThemeBody(before)
    @yield('content')
    @ThemeBody(after)
    @stack('scripts')
</body>

</html>
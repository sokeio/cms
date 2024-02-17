<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    @ThemeHead(before)
    @ThemeHead(after)
    @stack('styles')
    <style type="text/css">
        {!! theme_option('custom_css') !!}
    </style>
</head>

<body class="{{ theme_class() }}" :class="themeDark && 'theme-dark'" x-data="{ themeDark: false }">
    @ThemeBody(before)
    @yield('content')
    @ThemeBody(after)
    @stack('scripts')
    <script type="text/javascript">
        {!! theme_option('custom_js') !!}
    </script>
</body>

</html>

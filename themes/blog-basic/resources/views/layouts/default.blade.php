<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    @ThemeHead(before)
    @ThemeHead(after)
    @stack('styles')
</head>

<body class="{{ theme_class() }}">
    @ThemeBody(before)
    <div class="page">
        @include('theme::share.header')
        @php
            do_action('theme::body.before');
        @endphp
        <div class="page-wrapper">
            <!-- Page body -->
            <div class="page-body">
                @yield('content')
            </div>
        </div>
        @php
            do_action('theme::body.before');
        @endphp
        @include('theme::share.footer')
    </div>
    @ThemeBody(after)
    @stack('scripts')
    </div>
</body>

</html>

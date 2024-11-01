<!doctype html>
<html>
<head>
    @themeHead()
    @stack('styles')
</head>
<body @themeBodyAttr() >
    @themeBody
    <div class="page">
        @themeInclude('shared.header')
        <div class="page-wrapper">
            <div class="container-xxl">
            @yield('content')
            </div>
        </div>
        @themeInclude('shared.footer')
    </div>
    @themeBodyEnd
    @stack('scripts')
</body>
</html>

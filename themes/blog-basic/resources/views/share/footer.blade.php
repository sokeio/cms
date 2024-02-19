<footer class="site-footer border-top {!! theme_option('footer_color') !!}">
    <div class="container">
        <div class="py-5">
            <div class="row">
                <div class="col-auto mb-3">
                    <div class="pe-4">{!! theme_option('footer_about') !!}</div>
                </div>
                <div class="col">
                    <div class="row">
                        @for ($i = 1; $i <= 4; $i++)
                            @if ($title = theme_option('footer_column_title' . $i))
                                <div class="col-6 col-md-2 mb-2 footer-column footer-column-{{ $i }}">
                                    <h5>{!! $title !!}</h5>
                                    {!! theme_position('footer_column' . $i) !!}
                                </div>
                            @endif
                        @endfor
                    </div>
                </div>
            </div>
        </div>
                <div class="text-center">Developed by <a href="https://hau.xyz" class="fw-bold {!! theme_option('footer_color') !!}" title="Nguyễn Văn Hậu">Nguyễn Văn Hậu</a>.
                    Copyright © {{ date('Y') }} {!! theme_option(
                        'footer_copyright',
                        '<a href="https://sokeio.com" class=" fw-bold '.theme_option('footer_color') .'" title="Sokeio">Sokeio.com</a>',
                    ) !!} All rights reserved. @if (!setting('PLATFORM_HIDE_LOADED_TIME', false))
                    <span class="text-right text-sm">{{ sokeio_time() }}ms</span>
                @endif</div>
        </div>
    </div>
</footer>

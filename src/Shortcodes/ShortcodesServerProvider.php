<?php

namespace Sokeio\Cms\Shortcodes;

use Illuminate\Support\ServiceProvider;
use Sokeio\Facades\Shortcode;

class ShortcodesServerProvider extends ServiceProvider
{
    public function boot()
    {
        Shortcode::register(PostShortcode::class);
        Shortcode::register(SlideShortcode::class);
    }
}

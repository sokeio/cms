<?php

use Sokeio\Cms\Facades\Shortcode;

if (!function_exists('shortcode_render')) {
    function shortcode_render($text)
    {
        return Shortcode::compile($text);
    }
}
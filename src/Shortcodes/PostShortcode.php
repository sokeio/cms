<?php

namespace Sokeio\Cms\Shortcodes;

use Sokeio\Cms\Shortcode\Shortcode;

class PostShortcode extends Shortcode
{

    public static function getName()
    {
    }

    public static function getKey()
    {
        return 'POST_LIST';
    }
    public static function getParamUI()
    {
        return [];
    }
}

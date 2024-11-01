<?php

namespace Sokeio\CMS;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Sokeio\CMS\Shortcode
 *
 * @method static mixed all()
 * @method static void register($shortcode)
 * @method static mixed render($shortcode, $attributes = [], $content = '')
 * @method static mixed getShortcode($shortcode,$key = null)
 */

class Shortcode extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'shortcode';
    }
}

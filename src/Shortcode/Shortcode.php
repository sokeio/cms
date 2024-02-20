<?php

namespace Sokeio\Cms\Shortcode;

use Sokeio\Laravel\BaseCallback;

class Shortcode extends BaseCallback
{
    public static function getName()
    {
    }
    public static function getKey()
    {
    }
    public static function getParamUI()
    {
        return [];
    }
    public static function EnableChildContent()
    {
        return true;
    }

    public function renderHtml(ShortcodeInfo $shortcode, ShortcodeManager $manager, $viewData = [])
    {
    }
}

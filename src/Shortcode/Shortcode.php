<?php

namespace Sokeio\Cms\Shortcode;

use GuzzleHttp\RetryMiddleware;
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
    public function renderHtml(ShortcodeInfo $shortcode, ShortcodeManager $manager, $viewData = [])
    {
    }
}

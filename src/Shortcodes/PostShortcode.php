<?php

namespace Sokeio\Cms\Shortcodes;

use Sokeio\Cms\Shortcode\Shortcode;
use Sokeio\Cms\Shortcode\ShortcodeInfo;
use Sokeio\Cms\Shortcode\ShortcodeManager;
use Sokeio\Components\UI;

class PostShortcode extends Shortcode
{

    public static function getName()
    {
        return __('cms::shortcode.post');
    }

    public static function getKey()
    {
        return 'CMS::POST_LIST';
    }
    public static function getParamUI()
    {
        return [
            UI::Text('title')->Label(__('Title')),
        ];
    }
    public function renderHtml(ShortcodeInfo $shortcode, ShortcodeManager $manager, $viewData = [])
    {
        return urlencode(json_encode($shortcode->toArray()));
    }
}

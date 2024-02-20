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
    public static function EnableChildContent(){
        return false;
    }
    public static function getParamUI()
    {
        return [
            UI::Text('title')->Label(__('Title')),
            UI::Select('catalogs.id')->Label(__('Category'))->DataSource(function () {
                return \Sokeio\Cms\Models\Catalog::all()->map(function ($item) {
                    return [
                        'id' => $item->id,
                        'name' => $item->name
                    ];
                });
            })
        ];
    }
    public function renderHtml(ShortcodeInfo $shortcode, ShortcodeManager $manager, $viewData = [])
    {
        return view_scope('cms::shortcode.post', ['shortcode' => $shortcode, 'viewData' => $viewData])->render();
    }
}

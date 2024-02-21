<?php

namespace Sokeio\Cms\Shortcodes;

use Sokeio\Cms\Models\Post;
use Sokeio\Cms\Shortcode\WithShortcode;
use Sokeio\Component;
use Sokeio\Components\UI;

class PostShortcode extends Component
{
    use WithShortcode;
    public static function getShortcodeName()
    {
        return __('cms::shortcode.post');
    }
    public static function getShortcodeKey()
    {
        return 'CMS::POST_LIST';
    }
    public static function getShortcodeParamUI()
    {
        return [
            UI::Text('title')->Label(__('Title')),
            UI::Select('catalogs_id')->Label(__('Category'))->DataSource(function () {
                return [
                    [
                        'id' => '',
                        'name' => __('None')
                    ],
                    ...\Sokeio\Cms\Models\Catalog::all()->map(function ($item) {
                        return [
                            'id' => $item->id,
                            'name' => $item->name
                        ];
                    })
                ];
            })
        ];
    }
    public static function EnableContent()
    {
        return false;
    }
    public function render()
    {
        return view('cms::shortcodes.post');
    }
}

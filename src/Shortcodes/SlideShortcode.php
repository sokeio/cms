<?php

namespace Sokeio\Cms\Shortcodes;

use Sokeio\Shortcode\WithShortcode;
use Sokeio\Component;
use Sokeio\Components\UI;

class SlideShortcode extends Component
{
    use WithShortcode;
    public static function getShortcodeName()
    {
        return __('cms::shortcode.slide');
    }
    public static function getShortcodeKey()
    {
        return 'cms::slide';
    }
    public static function getShortcodeParamUI()
    {
        return [
            UI::Text('title')->Label(__('Title')),
            UI::Text('id')->Label(__('ID')),
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
    public function mount()
    {
        if (!isset($this->shortcodeAttrs['id'])) {
            $this->shortcodeAttrs['id'] = 'slide-' . uniqid();
        }
    }
    public static function EnableContent()
    {
        return false;
    }
    public function render()
    {
        return view('cms::shortcodes.slide');
    }
}

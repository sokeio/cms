<?php

namespace Sokeio\Cms\Shortcodes;

use Livewire\Livewire;
use Sokeio\Cms\Models\Post;
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
    public static function EnableChildContent()
    {
        return false;
    }
    public static function getParamUI()
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
    public function renderHtml(ShortcodeInfo $shortcode, ShortcodeManager $manager, $viewData = [])
    {
        return Livewire::mount('cms::shortcode', [
            'shortcode' => $shortcode->getName(),
            'attrs' => $shortcode->toArray(),
            'content' => $shortcode->getContent(),
            'viewData' => $viewData
        ]);
    }
    public function getView()
    {
        return 'cms::shortcode.post';
    }
    public function getData()
    {
        $query = Post::query();

        return [
            'posts' => $query->get(['id', 'name', 'slug', 'image', 'description', 'created_at'])
        ];
    }
}

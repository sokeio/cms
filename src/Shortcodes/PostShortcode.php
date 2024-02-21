<?php

namespace Sokeio\Cms\Shortcodes;

use Sokeio\Cms\Models\Post;
use Sokeio\Cms\Shortcode\WithShortcode;
use Sokeio\Components\UI;

class PostShortcode
{
    use WithShortcode;

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
    public function test()
    {
        $this->getManager()->showMessage('test');
    }
}

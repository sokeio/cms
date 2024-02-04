<?php

namespace Sokeio\Cms\Livewire;

use Sokeio\Cms\Models\Post;
use Sokeio\Components\FormMenu;
use Sokeio\Components\UI;
use Sokeio\Menu\MenuItemBuilder;

class MenuItemPost extends FormMenu
{
    public static function RenderItem(MenuItemBuilder $item)
    {
    }
    public static function getMenuName()
    {
        return __('Post');
    }
    public static function getMenuType()
    {
        return 'MenuItemPost';
    }
    public function SearchPosts($text)
    {
        $this->skipRender();
        return Post::query()->where('name', 'like', '%' . $text . '%')->limit(20)->get(['id', 'name']);
    }
    protected function MenuUI()
    {
        return [
            UI::SelectWithSearch('data')->Label(__('Post'))->required()->SearchDataSource('SearchPosts')->DataSource(function () {
                return $this->SearchPosts('');
            }),
        ];
    }
}

<?php

namespace Sokeio\Cms\Livewire;

use Sokeio\Cms\Models\Page;
use Sokeio\Components\FormMenu;
use Sokeio\Components\UI;
use Sokeio\Menu\MenuItemBuilder;

class MenuItemPage extends FormMenu
{
    public static function RenderItem(MenuItemBuilder $item)
    {
        echo  view_scope('sokeio::menu.item.link', ['item' => $item, 'link' => Page::find($item->getValueContentData())?->getSeoCanonicalUrl()])->render();
    }
    public static function getMenuName()
    {
        return __('Page');
    }
    public static function getMenuType()
    {
        return 'MenuItemPage';
    }
    public function SearchPages($text)
    {
        $this->skipRender();
        return Page::query()->where('name', 'like', '%' . $text . '%')->limit(20)->get(['id', 'name']);
    }
    protected function MenuUI()
    {
        return [
            UI::SelectWithSearch('data')->Label(__('Page'))->required()->SearchDataSource('SearchPages')->DataSource(function () {
                return $this->SearchPages('');
            }),
        ];
    }
}

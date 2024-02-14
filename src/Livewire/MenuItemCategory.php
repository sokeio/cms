<?php

namespace Sokeio\Cms\Livewire;

use Sokeio\Cms\Models\Catalog;
use Sokeio\Components\FormMenu;
use Sokeio\Components\UI;
use Sokeio\Menu\MenuItemBuilder;

class MenuItemCategory extends FormMenu
{
    public static function RenderItem(MenuItemBuilder $item)
    {
        echo  view_scope('sokeio::menu.item.link', ['item' => $item, 'link' => Catalog::find($item->getValueContentData())?->getSeoCanonicalUrl()])->render();
    }
    public static function getMenuName()
    {
        return __('Catagory');
    }
    public static function getMenuType()
    {
        return 'MenuItemCategory';
    }
    public function SearchCatagory($text)
    {
        $this->skipRender();
        return Catalog::query()->where('name', 'like', '%' . $text . '%')->limit(20)->get(['id', 'name']);
    }
    protected function MenuUI()
    {
        return [
            UI::SelectWithSearch('data')->Label(__('Catagory'))->required()->SearchDataSource('SearchCatagory')->DataSource(function () {
                return $this->SearchCatagory('');
            }),
        ];
    }
}

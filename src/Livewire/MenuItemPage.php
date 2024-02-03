<?php

namespace Sokeio\Cms\Livewire;

use Sokeio\Cms\Models\Page;
use Sokeio\Components\FormMenu;
use Sokeio\Components\UI;

class MenuItemPage extends FormMenu
{
   protected function getMenuType(){
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

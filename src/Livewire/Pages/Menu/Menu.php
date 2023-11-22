<?php

namespace Sokeio\Cms\Livewire\Pages\Menu;

use Sokeio\Cms\Models\MenuLocation;
use Sokeio\Component;

class Menu extends Component
{
    public $locationId;
    public function render()
    {
        page_title('Menu Setting');
        return view('cms::pages.menu.index', [
            'MenuLocation' => MenuLocation::all()
        ]);
    }
}

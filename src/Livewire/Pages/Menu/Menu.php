<?php

namespace Sokeio\Sokeio\Livewire\Pages\Menu;

use Sokeio\Sokeio\Models\MenuLocation;
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

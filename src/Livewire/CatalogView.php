<?php

namespace Sokeio\Cms\Livewire;

use Sokeio\Cms\Models\Catalog;
use Sokeio\Component;

class CatalogView extends Component
{
    public Catalog $catalog;
    public function render()
    {
        return view_scope('cms::page', ['catalog' => $this->catalog]);
    }
}

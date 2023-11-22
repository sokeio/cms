<?php
namespace Sokeio\BlogTheme\Livewire;
use Sokeio\Component;

class Offcanvas extends Component {
    public function render() {
        page_title('Offcanvas');
        return view('theme::pages.components.offcanvas');
    }
}
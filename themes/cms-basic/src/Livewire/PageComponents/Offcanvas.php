<?php
namespace BytePlatform\ThemeCms\Livewire;
use BytePlatform\Component;

class Offcanvas extends Component {
    public function render() {
        page_title('Offcanvas');
        return view('theme::pages.components.offcanvas');
    }
}